{{--<div class="robo-table-wrapper js-scrollableX">--}}

<div class="robo-table-wrapper js-robo-table-wrapper">
    @include('_mobile/roboAdvisors/_robo-table-mob-layout', ['roboAdvisors' => $roboAdvisors, 'compareList' => getCompareList('compare_list') , 'robo_clone' => true])
    <div class="robo-table-scroll js-scrollableX">
        @include('_mobile/roboAdvisors/_robo-table-mob-layout', ['roboAdvisors' => $roboAdvisors, 'compareList' => getCompareList('compare_list') , 'robo_clone' => false])
    </div>
</div>