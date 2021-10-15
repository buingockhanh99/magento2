require(["jquery", "mage/calendar"], function($){
    $(document).ready(function(){
        var enableDays = ["08","09","10","11","12"];
        function unavailable(date)
        {
            var sdate = $.datepicker.formatDate('dd',date);
            if($.inArray(sdate, enableDays) != -1) {
                return [true];
            }
            return [false];
            // return [unavailableDates.indexOf(string) == -1];
        }

        $("input[name='product[time_start]']").calendar({beforeShowDay: unavailable});
        $("input[name='product[time_end]']").calendar({beforeShowDay: unavailable});

    });
});
