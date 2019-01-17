<?php

use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class RoboAdvisorSeeder extends Seeder
{
    private $robo_advisor_iteration = 0;
    private $account_type_iteration = 0;
    private $usage_type_iteration = 0;
    const ABOUT_COMPANY = "<p>Wealthfront is one of many robo advisors on the market.
                                <a href=\"#\">These automated investing platforms</a>
                                have democratized investing by providing services that you once needed an
                                expensive personal advisor to receive. And it’s proved enormously popular.
                                Since its launch in December 2011, Wealthfront has built up its assets under
                                management (AUM) to $10.5 billion.
                            </p>
                            <p>
                                How it works is simple: You invest your money into a Wealthfront account
                                (there’s a required minimum of $500). You can choose to use a tax-deferred
                                individual retirement account (IRA) if you wish. Funds aren’t held by
                                Wealthfront, but by the Royal Bank of Canada (RBC).
                            </p>
                            <p>
                                Wealthfront then allocates your investment into an assortment of
                                <a href=\"#\">exchange-traded funds (ETFs).</a>
                            </p>
                            <p>
                                Like many robo-investing services, Wealthfront uses
                                <a href=\"#\">Modern Portfolio Theory (MPT)</a>
                                to create an automated asset allocation, taking into account your risk
                                tolerance and financial needs. The platform continually makes sure that the
                                allocation is correct with <a href=\"#\">automatic rebalancing.</a>
                            </p>
                            <br>
                            <h3>
                                Free Financial Planning With Path
                            </h3>
                            <p>
                                But let’s back up a step — Wealthfront uses a savings model called Path that
                                was developed by a team of Ph.D.s to help you reach your goals.
                                Using Path, you can set savings goals for the big stuff: retirement,
                                college and/or a home purchase. This service takes all of your
                                accounts — including external savings, banking and even mortgage accounts — and
                                creates personal financial advice. Path generates scenarios to help you
                                determine if you’re on the right… well… path to meet your savings goals.
                                And if not, it will suggest the best ways to go about doing so. Path is not a
                                separate app; it’s built into everything Wealthfront does.
                            </p>
                            <p>
                                It’s like having a personal financial advisor that’s software based.
                            </p>
                            <p>
                                Not only that, but you can use Path for free with no investment required.
                                In fact, Wealthfront is now the only robo advisor to offer free financial
                                planning. All you have to do is download the Wealthfront app and Path will
                                get to work for you, with the ability to answer more than 10,000 questions
                                tailored to your personal financial situation.
                            </p>
                            <p>
                                With Path, Wealthfront can help you answer these questions:
                            </p>
                            <ul>
                                <li>How much should you save today?</li>
                                <li>How much will you be worth then?</li>
                                <li>Could you live your current lifestyle at retirement?</li>
                                <li>Are you on track for your child’s college education?</li>
                                <li>Are you saving enough to purchase a home?</li>
                            </ul>";
    const PROS = "<p>
                    <strong>Free for Accounts Under $5,000</strong>
                    — With our special promotion link. Even more is possible
                    with the refer-a-friend offer.
                </p>
                <p>
                    <strong>Tax-Loss Harvesting for All Accounts</strong>
                    — This is Wealthfront's specialty. It helps with taxable accounts
                    and according to Wealthfront helps increase returns.
                </p>
                <p>
                    <strong>Stock Level Tax-Loss Harvesting</strong>
                    — When investing over $100,000, it's a further way to decrease taxes
                    and fund expenses by avoiding ETF fees.
                </p>
                <p>
                    <strong>Risk Parity</strong>
                    — The recently added risk parity option may smooth out returns
                    compared to the traditional 60% stock/40% bond portfolio.
                    However, we question at what cost, and Wealthfront's
                    performance remains untested.
                </p>
                <p>
                    <strong>529 Plan Option</strong>
                    — This option makes Wealthfront somewhat unique in that most
                    robo advisors focus only on retirement planning.
                </p>
                <p>
                    <strong>Two-Factor Authentication</strong>
                    — Either via a SMS text message or an app installed on your phone,
                    you can be assured that your account is protected
                    from hackers gaining entry.
                </p>
                <p>
                    <strong>Free Financial Planning</strong>
                    — You can use Wealthfront's financial planning service,
                    Path, with no obligation or required investment.
                </p>
                <p>
                    <strong>Path Considers External Accounts</strong>
                    — The Path planning tools consider all of your accounts,
                    even those held outside Wealthfront, to give you a complete
                    picture of your goals.
                </p>";
    const CONS = "<p>
                    <strong>No Fractional Shares</strong>
                    — It's possible to have cash sitting in your account, not invested.
                </p>";
    const HOW_IT_WORKS = "<p>
                                Wealthfront uses a team of “world-class financial experts” led by
                                legendary economist Burton Malkiel. He’s the author of the investment
                                classic <a href=\"#\">A Random Walk Down Wall Street</a>, which I recommend reading.
                                Malkiel is Wealthfront’s Chief Investment Officer.
                            </p>
                            <p>
                                Wealthfront has some similarities to <a href=\"#\">Betterment</a> and other robo advisors,
                                in that you start by completing a questionnaire. Wealthfront’s questionnaire
                                has four objective questions and six subjective ones. The purpose of the
                                survey is to determine your risk tolerance and to set asset allocations.
                            </p>
                            <p>
                                Once established, the allocations will remain constant regardless of the
                                amount of money you have invested. After specific thresholds are crossed
                                within your account, the portfolio will automatically be adjusted to ensure
                                it stays in line with the proposed asset mix.
                            </p>
                            <p>
                                <strong>Account Minimums.</strong>
                                The minimum account size is $500, and there is also
                                a minimum withdrawal amount, which is $250. You cannot draw your
                                account below the $500 minimum.
                            </p>
                            <p>
                                <strong>Fees.</strong>
                                There’s a lot of good news here. From <a href=\"#\">our research</a>, for accounts
                                under $10,000, Wealthfront is one of the cheapest robo advisors,
                                including ETF fees. Annually, expect to shell out 0.25%.
                                However, with our promo link, the first $5,000 in your account is
                                managed free, and amounts above $5,000 have an annual 0.25% fee.
                            </p>
                            <p>
                                Let’s break it down. On a $100,000 account the fee would be $237.50 for a
                                full year — and with our exclusive promotional link, the first $5,000
                                would be excluded from annual fees. The amount of the annual fee will
                                be prorated and withdrawn on a monthly basis. Wealthfront is cheap when
                                compared to the thousands of dollars in fees typically charged by
                                financial advisors.
                            </p>
                            <p>
                                As mentioned above, there’s another way to have more than $5,000 managed
                                free under Wealthfront. After becoming a Wealthfront customer,
                                refer friends to the service. Each new signup grants you an
                                additional $5,000 of free management.
                            </p>
                            <p>
                                The only other fee you incur is the very low fee embedded in the cost
                                of the ETFs. From our 60% stocks, 40% bonds portfolio test, we found the
                                ETF fees averaged 0.18%. That gives Wealthfront an advantage over even
                                the deepest discount brokers.
                            </p>";
    const PORTFOLIO = "<p>
                                Depending on whether your account is taxable or tax-deferred (e.g., an IRA),
                                the asset allocation and fund selection may be slightly different.
                            </p>
                            <p>
                                The portfolio Wealthfront creates for you will be based on the ETFs listed below.
                            </p>
                            <br>
                            <h3>Stocks</h3>
                            <div class=\"panel panel_white panel_negative-margin\">
                                <table class=\"robo-advisor__simple-table
                                 robo-advisor__simple-table_with-padding
                                 robo-advisor__simple-table_three\">
                                    <tbody>
                                    <tr>
                                        <th>SECTOR</th>
                                        <th>ETF</th>
                                        <th>TICKER</th>
                                    </tr>
                                    <tr>
                                        <td>US</td>
                                        <td>Vanguard US Total Stock Market</td>
                                        <td>VTI</td>
                                    </tr>
                                    <tr>
                                        <td>Foreign</td>
                                        <td>Vanguard FTSE Developed Markets</td>
                                        <td>VEA</td>
                                    </tr>
                                    <tr>
                                        <td>Emerging Market</td>
                                        <td>Vanguard FTSE Emerging Markets</td>
                                        <td>VWO</td>
                                    </tr>
                                    <tr>
                                        <td>Dividend</td>
                                        <td>Vanguard Dividend Appreciation</td>
                                        <td>VIG</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <h3>Stocks</h3>
                            <div class=\"panel panel_white panel_negative-margin\">
                                <table class=\"robo-advisor__simple-table
                                     robo-advisor__simple-table_with-padding
                                     robo-advisor__simple-table_three\">
                                    <tbody>
                                    <tr>
                                        <th>SECTOR</th>
                                        <th>ETF</th>
                                        <th>TICKER</th>
                                    </tr>
                                    <tr>
                                        <td>US TIPS</td>
                                        <td>Schwab US TIPS</td>
                                        <td>SCHP</td>
                                    </tr>
                                    <tr>
                                        <td>US Government</td>
                                        <td>Vanguard Total Bond Market</td>
                                        <td>BND</td>
                                    </tr>
                                    <tr>
                                        <td>Muni</td>
                                        <td>iShares National AMT-Free Muni Bond</td>
                                        <td>MUB</td>
                                    </tr>
                                    <tr>
                                        <td>Corporate</td>
                                        <td>iShares Corporate Bond</td>
                                        <td>LQD</td>
                                    </tr>
                                    <tr>
                                        <td>Emerging Market</td>
                                        <td>iShares JPMorgan Emerging Markets Bond</td>
                                        <td>EMB</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <h3>Stocks</h3>
                            <div class=\"panel panel_white panel_negative-margin\">
                                <table class=\"robo-advisor__simple-table
                                     robo-advisor__simple-table_with-padding
                                     robo-advisor__simple-table_three\">
                                    <tbody>
                                    <tr>
                                        <th>SECTOR</th>
                                        <th>ETF</th>
                                        <th>TICKER</th>
                                    </tr>
                                    <tr>
                                        <td>Real Estate</td>
                                        <td>Vanguard REIT</td>
                                        <td>VNQ</td>
                                    </tr>
                                    <tr>
                                        <td>Natural Resources</td>
                                        <td>Energy Select Sector SPDR</td>
                                        <td>XLE</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <h3>Risk Parity Fund</h3>
                            <p>
                                The newest investment product offered by Wealthfront — and the company’s
                                first mutual fund — <a href=\"#\">the PassivePlus Risk Parity fund</a>
                                aims to deliver higher
                                risk-adjusted returns in different market conditions. It does this by giving
                                your portfolio more exposure to asset classes with higher risk-adjusted returns.
                            </p>
                            <p>
                                The fund is based in part on a similar offering from Ray Dalio’s hedge fund,
                                Bridgewater, which requires a $100 million account minimum. It will take up
                                20% of your portfolio or less, depending you your personal settings.
                                Wealthfront aims to democratize this strategy with a
                                requirement of only $100,000.
                            </p>
                            <p>
                                To participate in this fund, you must have a minimum of $100,000 deposited.
                                The fund has an annual fee of 0.25%, which will translate
                                to only a 0.05% hike to your regular fee.
                            </p>
                            <p>
                                The Risk Parity fund is available only for
                                taxable accounts (no IRAs) at the moment.
                            </p>
                            <div class=\"panel panel_white panel_negative-margin\">
                                <table class=\"robo-advisor__simple-table
                                     robo-advisor__simple-table_with-padding
                                     robo-advisor__simple-table_three\">
                                    <tbody>
                                    <tr>
                                        <th>STRUCTURE</th>
                                        <th>INVESTMENT MINIMUM</th>
                                        <th>EXPENSE RATIO</th>
                                    </tr>
                                    <tr>
                                        <td>Mutual Fund</td>
                                        <td>$100K</td>
                                        <td>0.50%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>";
    const CONCLUSION = "<p>
                                Overall, Wealthfront appears to be an excellent investment service.
                                It shines with taxable accounts. Now that Wealthfront offers tax-loss
                                harvesting for all accounts, its service can minimize your
                                annual tax expenses.
                            </p>
                            <p>
                                If you’re a beginning investor who’s leery of jumping into individual
                                security selection and management, Wealthfront would be an excellent
                                choice. And it’s a superior vehicle for any passive investor, since
                                the selection and maintenance of individual securities is completely
                                unnecessary. Such an investor should supplement their Wealthfront
                                position with substantial cash-type holdings outside.
                            </p>
                            <p>
                                But more active investors can find use here
                                if they supplement with a self-directed account.
                            </p>
                            <p>
                                But it’s the everyday savers whom Wealthfront is particularly looking
                                to reach. With its Path planning model, you can “set it an forget it”
                                and let Wealthfront do all of the heavy lifting.
                            </p>
                            <p>
                                For individuals who are looking for a more comprehensive online financial
                                planning app with optional financial advisor advice,
                                <a href=\"#\">Personal Capital</a> is a good option as well.
                            </p>
                            <br>
                            <h3>
                                Free Financial Planning With Path
                            </h3>
                            <p>
                                You are being referred to Wealthfront Advisers LLC (“Wealthfront Advisers”)
                                by Investor Junkie. Wealthfront Advisers has engaged Investor Junkie to act
                                as a solicitor and refer potential clients to Wealthfront Advisers via
                                advertisements placed on Investor Junkie’s website. Investor Junkie and
                                Wealthfront Advisers are not affiliated with one another and have no formal
                                relationship outside this arrangement. Wealthfront Advisers has agreed to
                                compensate Investor Junkie for its referral services, and under this
                                agreement will pay Investor Junkie a cash fee when you open an account
                                with Wealthfront Advisers after clicking through this page. You will not
                                be charged anything in connection with this referral, and this arrangement
                                will not affect the advisory fees you will pay to Wealthfront Advisers
                                compared to other advisory clients of Wealthfront Advisers. Additional
                                information about Wealthfront Advisers may be found in its firm brochure
                                located here. By clicking on the button on this page, you acknowledge
                                receipt of the foregoing disclosure and the firm brochure accessible via
                                the link in the preceding sentence.
                            </p>";

    const ROBO_ADVISORS = [
        'WEALTHFRONT' => [
            'name' => 'Wealthfront',
            'logo' => '/files/wealthfront-review.png',
            'title' => 'Wealthfront Review 2018 – Improving on Passive Investing',
            'short_description' => "<p>Wealthfront is a robo advisor that emphasizes low fees and automated investing. The service shines when you have a taxable account, and the service is free for accounts under $5K if you use the Investor Junkie promotion or if you are referred by a current Wealthfront client. The negative is it doesn&#39;t support fractional shares.</p>",
            'description' => null,
            'about_company' => self::ABOUT_COMPANY,
            'pros' => self::PROS,
            'cons' => self::CONS,
            'how_it_works' => self::HOW_IT_WORKS,
            'portfolio' => self::PORTFOLIO,
            'conclusion' => self::CONCLUSION,
            'referral_link' => 'https://www.wealthfront.com/',
            'video_link' => null,
            'minimum_account' => '500',
            'management_fee' => '0.25',
            'fee_details' => 'Free under $10k and SoFi  Borrowers; 0.25%/year',
            'aum' => '11022761706',
            'promotions' => '$5k Managed for Free Exclusive',
            'human_advisors' => '0',
            'human_advisors_details' => null,
            'assistance_401k' => '1',
            'tax_loss' => '1',
            'tax_loss_details' => 'All Taxable Accounts',
            'portfolio_rebalancing' => '0',
            'retirement_planning' => '0',
            'automatic_deposits' => '1',
            'clearing_agency' => null,
            'self_clearing' => '0',
            'smart_beta' => '0',
            'responsible_investing' => '0',
            'invests_commodities' => '0',
            'real_estate' => '0',
            'fractional_shares' => '0',
            'access_platforms' => null,
            'two_factor_auth' => '0',
            'customer_service' => null,
            'number_accounts' => null,
            'average_account_size' => null,
            'additional_information' => null,
            'summary' => "Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment's asset allocation excludes REITs or commodities.",
            'is_verify' => '0',
            'service_region' => 'USA',
            'headquarters' => '900 Middlefield Rd., Redwood City, CA 94063',
            'founded' => '2008',
            'site_url' => null,
            'phone' => null,
            'ceo' => 'Andy Rachleff',
            'contact_details' => 'Clearing Agency: RBC | FINRA',
            'finra_crd' => '148456 | SEC',
            'sec_id' => '69766',
            'is_active' => '0',
            'ratings' => [
                 'commissions' => '9.00',
                'service' => '9.00',
                'comfortable' => '8.00',
                'tools' => '8.50',
                'investment_options' => '8.50',
                'asset_allocation' => '9.00',
                'total' => '8.67',
            ],
            'account_types' => [
                AccountTypeSeeder::ACCOUNT_TYPES['TAXABLE']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRADITIONAL_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SEP_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['JOINT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROLLOVER_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRUSTS']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['NON_PROFIT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROTH_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['529']['id'],
            ],
            'usage_types' => [
                UsageTypeSeeder::USAGE_TYPES['SMARTPHONE_USERS']['id'],
                UsageTypeSeeder::USAGE_TYPES['IRA_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['GOAL_ORIENTED_INVESTORS']['id'],
            ],
        ],
        'BETTERMENT' => [
            'name' => 'Betterment',
            'logo' => '/files/betterment-review.png',
            'title' => 'Betterment Review 2018 – Making Investing Simple',
            'short_description' => "<p>Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment&#39;s asset allocation excludes REITs or commodities.</p>",
            'description' => null,
            'about_company' => self::ABOUT_COMPANY,
            'pros' => self::PROS,
            'cons' => self::CONS,
            'how_it_works' => self::HOW_IT_WORKS,
            'portfolio' => self::PORTFOLIO,
            'conclusion' => self::CONCLUSION,
            'referral_link' => null,
            'video_link' => null,
            'minimum_account' => '0',
            'management_fee' => '0.15',
            'fee_details' => 'Digital – 0.15-0.25%/year; Premium – 0.30-0.40%/year',
            'aum' => '14142614130',
            'promotions' => 'Up To 1 Year Free',
            'human_advisors' => '0',
            'human_advisors_details' => null,
            'assistance_401k' => '1',
            'tax_loss' => '0',
            'tax_loss_details' => null,
            'portfolio_rebalancing' => '0',
            'retirement_planning' => '0',
            'automatic_deposits' => '0',
            'clearing_agency' => null,
            'self_clearing' => '0',
            'smart_beta' => '0',
            'responsible_investing' => '0',
            'invests_commodities' => '0',
            'real_estate' => '0',
            'fractional_shares' => '0',
            'access_platforms' => null,
            'two_factor_auth' => '0',
            'customer_service' => null,
            'number_accounts' => null,
            'average_account_size' => null,
            'additional_information' => null,
            'summary' => "Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment's asset allocation excludes REITs or commodities.",
            'is_verify' => '0',
            'service_region' => 'USA',
            'headquarters' => null,
            'founded' => '2008',
            'site_url' => null,
            'phone' => null,
            'ceo' => null,
            'contact_details' => null,
            'finra_crd' => '248456 | SEC',
            'sec_id' => '69666',
            'is_active' => '0',
            'ratings' => [
                'commissions' => '8.00',
                'service' => '9.00',
                'comfortable' => '9.00',
                'tools' => '9.00',
                'investment_options' => '9.00',
                'asset_allocation' => '8.50',
                'total' => '8.75',
            ],
            'account_types' => [
                AccountTypeSeeder::ACCOUNT_TYPES['TAXABLE']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRADITIONAL_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SEP_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['JOINT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROLLOVER_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRUSTS']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['NON_PROFIT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROTH_IRA']['id'],
            ],
            'usage_types' => [
                UsageTypeSeeder::USAGE_TYPES['BEGINNING_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['INTERMEDIATE_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['IRA_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['GOAL_ORIENTED_INVESTORS']['id'],
            ],
        ],
        'SOFI' => [
            'name' => 'SoFi',
            'logo' => '/files/sofi-wealth-management-review.png',
            'title' => 'SoFi Wealth Review 2018 – A Low-Cost Robo Advisor for Millennials',
            'short_description' => "<p>SoFi Wealth is an investment management service that combines robo investing with access to a human financial advisor. Accounts are free for SoFi borrowers and those with a portfolio below $10,000. SoFi Wealth focuses only on index fund investments to meet your financial goals, and you won&#39;t find tax loss harvesting.</p>",
            'description' => null,
            'about_company' => self::ABOUT_COMPANY,
            'pros' => self::PROS,
            'cons' => self::CONS,
            'how_it_works' => self::HOW_IT_WORKS,
            'portfolio' => self::PORTFOLIO,
            'conclusion' => self::CONCLUSION,
            'referral_link' => 'https://www.sofi.com/wealth-management/',
            'video_link' => null,
            'minimum_account' => '100',
            'management_fee' => '0.15',
            'fee_details' => 'Digital – 0.15-0.25%/year; Premium – 0.30-0.40%/year',
            'aum' => '43461313',
            'promotions' => null,
            'human_advisors' => '0',
            'human_advisors_details' => null,
            'assistance_401k' => '0',
            'tax_loss' => '0',
            'tax_loss_details' => null,
            'portfolio_rebalancing' => '0',
            'retirement_planning' => '0',
            'automatic_deposits' => '0',
            'clearing_agency' => null,
            'self_clearing' => '0',
            'smart_beta' => '0',
            'responsible_investing' => '0',
            'invests_commodities' => '0',
            'real_estate' => '0',
            'fractional_shares' => '0',
            'access_platforms' => null,
            'two_factor_auth' => '0',
            'customer_service' => null,
            'number_accounts' => null,
            'average_account_size' => null,
            'additional_information' => null,
            'summary' => "Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment's asset allocation excludes REITs or commodities.",
            'is_verify' => '0',
            'service_region' => 'USA',
            'headquarters' => null,
            'founded' => '2011',
            'site_url' => null,
            'phone' => null,
            'ceo' => null,
            'contact_details' => null,
            'finra_crd' => '15656',
            'sec_id' => '998766',
            'is_active' => '0',
            'ratings' => [
                'commissions' => '9.50',
                'service' => '9.00',
                'comfortable' => '9.50',
                'tools' => '8.00',
                'investment_options' => '7.50',
                'asset_allocation' => '8.00',
                'total' => '8.58',
            ],
            'account_types' => [
                AccountTypeSeeder::ACCOUNT_TYPES['TAXABLE']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRADITIONAL_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SEP_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['JOINT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROLLOVER_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROTH_IRA']['id'],
            ],
            'usage_types' => [
                UsageTypeSeeder::USAGE_TYPES['BEGINNING_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['INTERMEDIATE_INVESTORS']['id'],
            ],
        ],
        'WEALTHSIMPLE' => [
            'name' => 'Wealthsimple',
            'logo' => '/files/wealthsimple-review.png',
            'title' => 'Wealthsimple Review 2018 – Automated Investing With Human Advice',
            'short_description' => "<p>Wealthsimple is a solid addition to the current slate of robo advisors available. The service offers a socially responsible investment option, as well as assistance from a live representative. However, compared to other firms their fees are on the high side.</p>",
            'description' => null,
            'about_company' => self::ABOUT_COMPANY,
            'pros' => self::PROS,
            'cons' => self::CONS,
            'how_it_works' => self::HOW_IT_WORKS,
            'portfolio' => self::PORTFOLIO,
            'conclusion' => self::CONCLUSION,
            'referral_link' => 'https://investorjunkie.com/go/wealthsimple-compare1',
            'video_link' => null,
            'minimum_account' => '0',
            'management_fee' => '0.50',
            'fee_details' => '$0 to $100k – 0.50%/year; $100k+ – 0.40%/year',
            'aum' => '52233132',
            'promotions' => 'Up to $100 Bonus',
            'human_advisors' => '0',
            'human_advisors_details' => null,
            'assistance_401k' => '1',
            'tax_loss' => '1',
            'tax_loss_details' => 'All Taxable Accounts',
            'portfolio_rebalancing' => '1',
            'retirement_planning' => '0',
            'automatic_deposits' => '1',
            'clearing_agency' => null,
            'self_clearing' => '0',
            'smart_beta' => '0',
            'responsible_investing' => '1',
            'invests_commodities' => '0',
            'real_estate' => '0',
            'fractional_shares' => '1',
            'access_platforms' => 'Website, iOS App, Apple Watch, Android App',
            'two_factor_auth' => '0',
            'customer_service' => null,
            'number_accounts' => '9467',
            'average_account_size' => '5517',
            'additional_information' => null,
            'summary' => "Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment's asset allocation excludes REITs or commodities.",
            'is_verify' => '0',
            'service_region' => 'USA',
            'headquarters' => '860 Richmond St. W., Toronto M6J 1C9',
            'founded' => '2014',
            'site_url' => null,
            'phone' => null,
            'ceo' => 'Michael Katchen',
            'contact_details' => null,
            'finra_crd' => '148456 | SEC',
            'sec_id' => '69766',
            'is_active' => '0',
            'ratings' => [
                'commissions' => '7.00',
                'service' => '8.50',
                'comfortable' => '8.50',
                'tools' => '8.00',
                'investment_options' => '8.00',
                'asset_allocation' => '8.00',
                'total' => '8.00',
            ],
            'account_types' => [
                AccountTypeSeeder::ACCOUNT_TYPES['TAXABLE']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRADITIONAL_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SEP_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['JOINT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROLLOVER_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRUSTS']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROTH_IRA']['id'],
            ],
            'usage_types' => [
                UsageTypeSeeder::USAGE_TYPES['BEGINNING_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['INTERMEDIATE_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['SMARTPHONE_USERS']['id'],
                UsageTypeSeeder::USAGE_TYPES['IRA_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['GOAL_ORIENTED_INVESTORS']['id'],
            ],
        ],
        'M1_FINANCE' => [
            'name' => 'M1 Finance',
            'logo' => '/files/m1-finance-review.png',
            'title' => 'M1 Finance Review 2018 – A Robo Advisor and Brokerage Hybrid',
            'short_description' => "<p>Combining the best of both traditional investment brokerage accounts and robo advisors, M1 Finance is dangerously close to being the perfect all-around investment platform. The only significant negatives are that it does not offer tax-loss harvesting or investment in mutual funds.</p>",
            'description' => null,
            'about_company' => self::ABOUT_COMPANY,
            'pros' => self::PROS,
            'cons' => self::CONS,
            'how_it_works' => self::HOW_IT_WORKS,
            'portfolio' => self::PORTFOLIO,
            'conclusion' => self::CONCLUSION,
            'referral_link' => 'https://www.m1finance.com/?utm_campaign=31834&utm_medium=ambassador&mbsy_source=bebe17e5-5ea0-4465-9a53-420efe39cdd6&campaignid=31834&mbsy=hTr8b&utm_source=hTr8b',
            'video_link' => null,
            'minimum_account' => '0',
            'management_fee' => null,
            'fee_details' => null,
            'aum' => '100000000',
            'promotions' => 'Invest for FREE',
            'human_advisors' => '0',
            'human_advisors_details' => null,
            'assistance_401k' => '0',
            'tax_loss' => '0',
            'tax_loss_details' => null,
            'portfolio_rebalancing' => '1',
            'retirement_planning' => '0',
            'automatic_deposits' => '1',
            'clearing_agency' => null,
            'self_clearing' => '0',
            'smart_beta' => '0',
            'responsible_investing' => '1',
            'invests_commodities' => '0',
            'real_estate' => '0',
            'fractional_shares' => '1',
            'access_platforms' => 'Website, iOS App, Android App',
            'two_factor_auth' => '0',
            'customer_service' => 'Phone: M-F 9A-5P CT; Email',
            'number_accounts' => '25000',
            'average_account_size' => '4000',
            'additional_information' => null,
            'summary' => "Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment's asset allocation excludes REITs or commodities.",
            'is_verify' => '0',
            'service_region' => 'USA',
            'headquarters' => '213 W. Institute Pl., Suite 301, Chicago, IL 60610',
            'founded' => '2015',
            'site_url' => null,
            'phone' => null,
            'ceo' => 'Brian Barnes',
            'contact_details' => null,
            'finra_crd' => '148456 | SEC',
            'sec_id' => '69766',
            'is_active' => '0',
            'ratings' => [
                'commissions' => '10.00',
                'service' => '7.00',
                'comfortable' => '9.00',
                'tools' => '7.50',
                'investment_options' => '9.50',
                'asset_allocation' => '9.00',
                'total' => '8.67',
            ],
            'account_types' => [
                AccountTypeSeeder::ACCOUNT_TYPES['TAXABLE']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRADITIONAL_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SEP_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['JOINT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROLLOVER_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRUSTS']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROTH_IRA']['id'],
            ],
            'usage_types' => [
                UsageTypeSeeder::USAGE_TYPES['BEGINNING_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['INTERMEDIATE_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['YOUNG_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['SMARTPHONE_USERS']['id'],
                UsageTypeSeeder::USAGE_TYPES['GOAL_ORIENTED_INVESTORS']['id'],
            ],
        ],
        'VPAS' => [
            'name' => 'Vanguard Personal Advisor Services',
            'logo' => '/files/vanguard-review.png',
            'title' => 'Vanguard Personal Advisor Services Review 2018 – Low-Cost, Personal Service',
            'short_description' => "<p>A solid entry into the robo advisor space, Vanguard Personal Advisor Services is backed by the trusted Vanguard brand and features real, live human advisors you can call. Unfortunately, the service requires a hefty $50k deposit, which excludes many beginning investors.</p>",
            'description' => null,
            'about_company' => self::ABOUT_COMPANY,
            'pros' => self::PROS,
            'cons' => self::CONS,
            'how_it_works' => self::HOW_IT_WORKS,
            'portfolio' => self::PORTFOLIO,
            'conclusion' => self::CONCLUSION,
            'referral_link' => 'https://investor.vanguard.com/advice/personal-advisor',
            'video_link' => null,
            'minimum_account' => '50000',
            'management_fee' => '0.30',
            'fee_details' => null,
            'aum' => null,
            'promotions' => null,
            'human_advisors' => '0',
            'human_advisors_details' => null,
            'assistance_401k' => '1',
            'tax_loss' => '0',
            'tax_loss_details' => null,
            'portfolio_rebalancing' => '1',
            'retirement_planning' => '0',
            'automatic_deposits' => '1',
            'clearing_agency' => null,
            'self_clearing' => '0',
            'smart_beta' => '0',
            'responsible_investing' => '0',
            'invests_commodities' => '0',
            'real_estate' => '0',
            'fractional_shares' => '0',
            'access_platforms' => 'Website, iOS App, Android App',
            'two_factor_auth' => '0',
            'customer_service' => 'Phone M-F 8A-8P ET; Email M-F',
            'number_accounts' => null,
            'average_account_size' => null,
            'additional_information' => null,
            'summary' => "Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment's asset allocation excludes REITs or commodities.",
            'is_verify' => '0',
            'service_region' => 'USA',
            'headquarters' => '100 Vanguard Blvd., Malvern, PA 19355',
            'founded' => '1975',
            'site_url' => null,
            'phone' => null,
            'ceo' => 'Tim Buckley',
            'contact_details' => null,
            'finra_crd' => '148456 | SEC',
            'sec_id' => '69766',
            'is_active' => '0',
            'ratings' => [
                'commissions' => '8.50',
                'service' => '7.50',
                'comfortable' => '7.00',
                'tools' => '6.50',
                'investment_options' => '9.50',
                'asset_allocation' => '8.00',
                'total' => '7.83',
            ],
            'account_types' => [
                AccountTypeSeeder::ACCOUNT_TYPES['TAXABLE']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRADITIONAL_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SEP_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['JOINT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROLLOVER_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SIMPLE_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRUSTS']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROTH_IRA']['id'],
            ],
            'usage_types' => [
                UsageTypeSeeder::USAGE_TYPES['BEGINNING_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['YOUNG_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['SMARTPHONE_USERS']['id'],
                UsageTypeSeeder::USAGE_TYPES['IRA_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['GOAL_ORIENTED_INVESTORS']['id'],
            ],
        ],
        'MEGI' => [
            'name' => 'Merrill Edge Guided Investing (MEGI)',
            'logo' => '/files/megi-review.png',
            'title' => 'Merrill Edge Guided Investing (MEGI) Review 2018 – Merrill Lynch Enters the Robo Advisor Space',
            'short_description' => "<p>MEGI is a robo advisor that combines automated investing with active management of your portfolio. It invests your money in index-based ETFs, but it actively manages your portfolio allocation. This gives you an opportunity to both outperform the market and minimize losses in a downturn. The major negative is that the management fee is higher than those of most other robo advisors. But the active management component may very well justify the higher fee.</p>",
            'description' => null,
            'about_company' => self::ABOUT_COMPANY,
            'pros' => self::PROS,
            'cons' => self::CONS,
            'how_it_works' => self::HOW_IT_WORKS,
            'portfolio' => self::PORTFOLIO,
            'conclusion' => self::CONCLUSION,
            'referral_link' => 'https://www.merrilledge.com/cmaoffer?cm_mmc=gwm-edge-inv-_-investorjunkie-_-1x1_na_600.jpg-_-2019_display_merrill_edge_baseline',
            'video_link' => null,
            'minimum_account' => '5000',
            'management_fee' => '0.45',
            'fee_details' => null,
            'aum' => null,
            'promotions' => null,
            'human_advisors' => '0',
            'human_advisors_details' => null,
            'assistance_401k' => '0',
            'tax_loss' => '0',
            'tax_loss_details' => null,
            'portfolio_rebalancing' => '1',
            'retirement_planning' => '0',
            'automatic_deposits' => '1',
            'clearing_agency' => null,
            'self_clearing' => '0',
            'smart_beta' => '0',
            'responsible_investing' => '0',
            'invests_commodities' => '0',
            'real_estate' => '0',
            'fractional_shares' => '0',
            'access_platforms' => 'Website, iOS App, Android App',
            'two_factor_auth' => '0',
            'customer_service' => 'Phone: 24/7; Live Chat: 24/7; Email',
            'number_accounts' => null,
            'average_account_size' => null,
            'additional_information' => null,
            'summary' => "Betterment is equally a good starting point for beginning investors and a useful platform for more experienced investors. The robo advisor has no minimum deposit and costs 0.25% annually. If you need the assistance, it recently added human advisors who can assist with your retirement account. Unfortunately, Betterment's asset allocation excludes REITs or commodities.",
            'is_verify' => '0',
            'service_region' => 'USA',
            'headquarters' => '1 Bryant Park, New York, NY 10036',
            'founded' => '2017',
            'site_url' => null,
            'phone' => null,
            'ceo' => 'Lizbeth Nelle Applebaum',
            'contact_details' => null,
            'finra_crd' => '148',
            'sec_id' => '6955766',
            'is_active' => '0',
            'ratings' => [
                'commissions' => '6.00',
                'service' => '8.50',
                'comfortable' => '8.00',
                'tools' => '10.00',
                'investment_options' => '8.00',
                'asset_allocation' => '8.00',
                'total' => '8.08',
            ],
            'account_types' => [
                AccountTypeSeeder::ACCOUNT_TYPES['TAXABLE']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['TRADITIONAL_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SEP_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SOLO_401(K)']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['JOINT']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROLLOVER_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['SIMPLE_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['ROTH_IRA']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['CUSTODIAL']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['401(K)']['id'],
                AccountTypeSeeder::ACCOUNT_TYPES['529']['id'],
            ],
            'usage_types' => [
                UsageTypeSeeder::USAGE_TYPES['BEGINNING_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['INTERMEDIATE_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['YOUNG_INVESTORS']['id'],
                UsageTypeSeeder::USAGE_TYPES['SMARTPHONE_USERS']['id'],
                UsageTypeSeeder::USAGE_TYPES['IRA_INVESTORS']['id'],
            ],
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @return void
     */
    public function run()
    {
        // clear tables
        DB::table('robo_advisors')->truncate();
        DB::table('ratings')->truncate();
        DB::table('account_type_robo_advisor')->truncate();
        DB::table('usage_type_robo_advisor')->truncate();
        // create base RoboAdvisors
        $this->createRoboAdvisors();
        // create RoboAdvisors clone
        $this->createRoboAdvisors(true, 5);
    }

    /**
     * @param bool $is_need_recursion
     * @param $max_recursion
     * @param int $recursion_level
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function createRoboAdvisors($is_need_recursion = false, $max_recursion = 0, $recursion_level = 1)
    {
        $slugify = new Slugify();

        foreach (self::ROBO_ADVISORS as $robo_advisor) {
            $this->robo_advisor_iteration++;
            $logo = '';
            $filesystem = new Filesystem();
            $path = __DIR__ . $robo_advisor['logo'];
            if ($filesystem->exists($path)) {
                $file_name = $this->robo_advisor_iteration. time() . '-' . $filesystem->basename($path);
                $file_content = $filesystem->get($path);
                Storage::disk('public')->put($file_name,  $file_content);
                $logo = $file_name;
            }
            $name = $is_need_recursion ? $robo_advisor['name'].'_(copy-'.$recursion_level.')':$robo_advisor['name'];
            DB::table('robo_advisors')->insert([
                'id' => $this->robo_advisor_iteration,
                'name' => $name,
                'slug' => $slugify->slugify($name),
                'logo' => $logo,
                'title' => $robo_advisor['title'],
                'short_description' => $robo_advisor['short_description'],
                'description' => $robo_advisor['description'],
                'about_company' => $robo_advisor['about_company'],
                'pros' => $robo_advisor['pros'],
                'cons' => $robo_advisor['cons'],
                'how_it_works' => $robo_advisor['how_it_works'],
                'portfolio' => $robo_advisor['portfolio'],
                'conclusion' => $robo_advisor['conclusion'],
                'referral_link' => $robo_advisor['referral_link'],
                'video_link' => $robo_advisor['video_link'],
                'minimum_account' => $robo_advisor['minimum_account'],
                'management_fee' => $robo_advisor['management_fee'],
                'fee_details' => $robo_advisor['fee_details'],
                'aum' => $robo_advisor['aum'],
                'promotions' => $robo_advisor['promotions'],
                'human_advisors' => $robo_advisor['human_advisors'],
                'human_advisors_details' => $robo_advisor['human_advisors_details'],
                'assistance_401k' => $robo_advisor['assistance_401k'],
                'tax_loss' => $robo_advisor['tax_loss'],
                'tax_loss_details' => $robo_advisor['tax_loss_details'],
                'portfolio_rebalancing' => $robo_advisor['portfolio_rebalancing'],
                'retirement_planning' => $robo_advisor['retirement_planning'],
                'automatic_deposits' => $robo_advisor['automatic_deposits'],
                'clearing_agency' => $robo_advisor['clearing_agency'],
                'self_clearing' => $robo_advisor['self_clearing'],
                'smart_beta' => $robo_advisor['smart_beta'],
                'responsible_investing' => $robo_advisor['responsible_investing'],
                'invests_commodities' => $robo_advisor['invests_commodities'],
                'real_estate' => $robo_advisor['real_estate'],
                'fractional_shares' => $robo_advisor['fractional_shares'],
                'access_platforms' => $robo_advisor['access_platforms'],
                'two_factor_auth' => $robo_advisor['two_factor_auth'],
                'customer_service' => $robo_advisor['customer_service'],
                'number_accounts' => $robo_advisor['number_accounts'],
                'average_account_size' => $robo_advisor['average_account_size'],
                'additional_information' => $robo_advisor['additional_information'],
                'summary' => $robo_advisor['summary'],
                'is_verify' => $robo_advisor['is_verify'],
                'service_region' => $robo_advisor['service_region'],
                'headquarters' => $robo_advisor['headquarters'],
                'founded' => $robo_advisor['founded'],
                'site_url' => $robo_advisor['site_url'],
                'phone' => $robo_advisor['phone'],
                'ceo' => $robo_advisor['ceo'],
                'contact_details' => $robo_advisor['contact_details'],
                'finra_crd' => $robo_advisor['finra_crd'],
                'sec_id' => $robo_advisor['sec_id'],
                'is_active' => $robo_advisor['is_active'],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
            DB::table('ratings')->insert([
                'id' => $this->robo_advisor_iteration,
                'commissions' => $robo_advisor['ratings']['commissions'],
                'service' => $robo_advisor['ratings']['service'],
                'comfortable' => $robo_advisor['ratings']['comfortable'],
                'tools' => $robo_advisor['ratings']['tools'],
                'investment_options' => $robo_advisor['ratings']['investment_options'],
                'asset_allocation' => $robo_advisor['ratings']['asset_allocation'],
                'total' => $robo_advisor['ratings']['total'],
                'robo_advisor_id' => $this->robo_advisor_iteration,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
            foreach ($robo_advisor['account_types'] as $account_type_id) {
                $this->account_type_iteration++;
                DB::table('account_type_robo_advisor')->insert([
                    'id' => $this->account_type_iteration,
                    'account_type_id' => $account_type_id,
                    'robo_advisor_id' => $this->robo_advisor_iteration,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]);
            }
            foreach ($robo_advisor['usage_types'] as $usage_type_id) {
                $this->usage_type_iteration++;
                DB::table('usage_type_robo_advisor')->insert([
                    'id' => $this->usage_type_iteration,
                    'usage_type_id' => $usage_type_id,
                    'robo_advisor_id' => $this->robo_advisor_iteration,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]);
            }
        }

        if ($is_need_recursion && $recursion_level < $max_recursion) {

            $this->createRoboAdvisors($is_need_recursion, $max_recursion, ++$recursion_level);
        }
    }
}
