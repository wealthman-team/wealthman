<?php
namespace App\Services;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\InteractsWithTime;
use Jenssegers\Agent\Agent;

class MobileDetectManager
{
    use InteractsWithTime;

    const LAYOUT_COOKIE = 'LAYOUT-TYPE';
    const DESKTOP = 'desktop';
    const MOBILE = 'mobile';
    const TABLET = 'tablet';

    /**
     * @var \Illuminate\Foundation\Application
     */
    private $app;
    /**
     * @var Agent
     */
    private $agent;
    /**
     * @var Request
     */
    private $request;

    /**
     * @var string|null
     */
    public $layout_type;
    /**
     * @var string|null
     */
    public $agent_layout_type;

    /**
     * @param  \Illuminate\Foundation\Application $app
     * @param Agent $agent
     * @param Request $request
     */
    public function __construct(Application $app, Agent $agent, Request $request)
    {
        $this->app = $app;
        $this->agent = $agent;
        $this->request = $request;
        $this->setLayoutType($this->request->cookie(self::LAYOUT_COOKIE, null));
    }

    /**
     * @param null $new_layout_type
     * @return null|string
     */
    public function setLayoutType($new_layout_type = null)
    {
        $agent_layout_type = $this->agent_layout_type;
        if (!$agent_layout_type) {
            $agent_layout_type = $this->updateAgentLayoutType();
        }

        if ($new_layout_type) {
            $this->layout_type = $new_layout_type;
        } else {
            $this->layout_type = $agent_layout_type;
        }

        $this->setViewMobile();

        return $this->layout_type;
    }

    /**
     * @return null|string
     */
    public function updateAgentLayoutType()
    {
        if ($this->agent->isMobile()) {
            $this->agent_layout_type = self::MOBILE;
        } elseif ($this->agent->isTablet()) {
            $this->agent_layout_type = self::TABLET;
        } else {
            $this->agent_layout_type = self::DESKTOP;
        }

        return $this->agent_layout_type;
    }

    public function setLayoutCookie(Response $response, $cookie_value = null)
    {
        $config = $this->app['config']->get('session', []);

        return $response->cookie(cookie(
            self::LAYOUT_COOKIE, $cookie_value ?? $this->layout_type, $this->availableAt(60 * $config['lifetime']),
            $config['path'], $config['domain'], $config['secure'], false, false, $config['same_site'] ?? null
        ));
    }

    /**
     * @return null|string
     */
    public function getLayoutType()
    {
        return $this->layout_type;
    }

    /**
     * set in config mobile templates if needle
     */
    public function setViewMobile()
    {
        if(!$this->is_desktop()) {
            $defaultPath = $this->app['config']->get('view.paths', []);
            $mobilePath = $this->app['config']->get('view.mobile_paths', []);
            $this->app['config']->set('view.paths', array_merge($mobilePath, $defaultPath));
        }
    }

    /**
     * @return bool
     */
    public function is_mobile()
    {
        $layout_type = $this->getLayoutType();
        if ($layout_type === self::MOBILE) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function is_tablet()
    {
        $layout_type = $this->getLayoutType();
        if ($layout_type === self::TABLET) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function is_desktop()
    {
        $layout_type = $this->getLayoutType();
        if ($layout_type === self::MOBILE || $layout_type === self::TABLET) {
            return false;
        }
        return true;
    }
}