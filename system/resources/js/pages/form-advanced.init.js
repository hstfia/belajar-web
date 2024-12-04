
/**
* Theme:  Simple - Responsive Bootstrap 4 Admin & Dashboard
* Author: Coderthemes
* File:   form-advanced
*/


!function($) {
    "use strict";

    var Components = function() {};


    //switch
    Components.prototype.initSwitchery = function() {
        $('[data-plugin="switchery"]').each(function (idx, obj) {
            new Switchery($(this)[0], $(this).data());
        });
    },


    //Select2
    Components.prototype.initSelect2 = function() {

        $('[data-toggle="select2"]').select2();
    },

    // Inputmask
    Components.prototype.initInputmask = function() {
        $('[data-toggle="input-mask"]').each(function (idx, obj) {
            var maskFormat = $(obj).data("maskFormat");
            var reverse = $(obj).data("reverse");
            if (reverse != null)
                $(obj).mask(maskFormat, {'reverse': reverse});
            else
                $(obj).mask(maskFormat);
        });
    },

    //Time Picker
    Components.prototype.initTimepicker = function() {
    // Time Picker
    $('#timepicker').timepicker({
        defaultTIme: false,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });
    $('#timepicker2').timepicker({
        showMeridian: false,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });
    $('#timepicker3').timepicker({
        minuteStep: 15,
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });
    },

    //colorpicker
    Components.prototype.initColorpicker= function() {
        // colorpicker
        $('#default-colorpicker').colorpicker({
            format: 'hex'
        });
        $('#rgba-colorpicker').colorpicker();
        $('#component-colorpicker').colorpicker({
            format: null
        });
    },

    //daterangepicker
    Components.prototype.initDaterangepicker= function() {
        //Date range picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-secondary'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            },
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-secondary'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '06/01/2019',
            maxDate: '06/30/2019',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-secondary',
            dateLimit: {
                days: 6
            }
        });

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-secondary',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
    },


    Components.prototype.initclockpicker = function() {

        $('.clockpicker').clockpicker({
            donetext: 'Done'
        });
    
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('#check-minutes').click(function (e) {
            // Have to stop propagation here
            e.stopPropagation();
            $("#single-input").clockpicker('show')
                .clockpicker('toggleView', 'minutes');
        });

    },
    
    Components.prototype.initparsley = function() {
        $('form-validation').parsley();      
    },

    Components.prototype.initDatePicker= function() {
        
       $('#datepicker').datepicker();
       $('#datepicker-autoclose').datepicker({
           autoclose: true,
           todayHighlight: true
       });
       $('#datepicker-inline').datepicker();
       $('#datepicker-multiple-date').datepicker({
           format: "mm/dd/yyyy",
           clearBtn: true,
           multidate: true,
           multidateSeparator: ","
       });
       $('#date-range').datepicker({
           toggleActive: true
       });
           
    },

    Components.prototype.initsummernote= function() {
            $('.summernote').summernote({
                height: 350,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
    },

    Components.prototype.initparsley= function() {
        $('.form-validation').parsley();
},

   
    //initilizing
    Components.prototype.init = function() {
        var $this = this;
        this.initSwitchery(),
        this.initSelect2(),
        this.initInputmask(),
        this.initTimepicker(),
        this.initColorpicker(),
        this.initDaterangepicker(),
        this.initclockpicker(),
        this.initparsley(),
        this.initDatePicker(),
        this.initsummernote(),
        this.initparsley()
    },

    $.Components = new Components, $.Components.Constructor = Components

}(window.jQuery),
    //initializing main application module
function($) {
    "use strict";
    $.Components.init();
}(window.jQuery);

