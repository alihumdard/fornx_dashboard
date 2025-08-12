$(function () {

    // Dashboard Sidebar Links
    $(".sidebar-navlist nav ul li > a").click(function () {
        console.log("Sidebar link clicked");
        
        $(this).next().slideUp(500);
        if (
            $(this)
                .parent()
                .hasClass("active")
        ) {
            $(".sidebar-navlist nav ul li").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-navlist nav ul li").removeClass("active");
            $(this)
                .next(".sidebar-navlist nav ul li > ul")
                .slideDown(500);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    // transaction-type-dropdown
    $('#transaction-type-dropdown').on('click', function () {
        $('#transaction-type').toggle();
    });
    $("#transaction-type-dropdown #transaction-type ul li").click(function () {
        var selectedText = $(this).text();
        $("#transaction-type-dropdown input").val(selectedText);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#transaction-type-dropdown').length) {
            $('#transaction-type').hide();
        }
    });

    // platform-selec-dropdown
    $('#platform-selec-dropdown').on('click', function () {
        $('#platform-dropdown').toggle();
    });
    $("#platform-selec-dropdown #platform-dropdown ul li").click(function () {
        var selectedText = $(this).text();
        $("#platform-selec-dropdown input").val(selectedText);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#platform-selec-dropdown').length) {
            $('#platform-dropdown').hide();
        }
    });

    // workdone-selec-dropdown
    $('#workdone-selec-dropdown').on('click', function () {
        $('#workdone-dropdown').toggle();
    });
    $("#workdone-selec-dropdown #workdone-dropdown ul li").click(function () {
        var selectedText = $(this).text();
        $("#workdone-selec-dropdown input").val(selectedText);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#workdone-selec-dropdown').length) {
            $('#workdone-dropdown').hide();
        }
    });

    // priority-selec-dropdown
    $('#priority-selec-dropdown').on('click', function () {
        $('#priority-dropdown').toggle();
    });
    $("#priority-selec-dropdown #priority-dropdown ul li").click(function () {
        var selectedText = $(this).text();
        $("#priority-selec-dropdown input").val(selectedText);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#priority-selec-dropdown').length) {
            $('#priority-dropdown').hide();
        }
    });

    // technology-selec-dropdown
    $('#technology-selec-dropdown').on('click', function () {
        $('#technology-dropdown').toggle();
    });
    $("#technology-selec-dropdown #technology-dropdown ul li").click(function () {
        var selectedText = $(this).text();
        $("#technology-selec-dropdown input").val(selectedText);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#technology-selec-dropdown').length) {
            $('#technology-dropdown').hide();
        }
    });

    // country-selec-dropdown
    $('#country-selec-dropdown').on('click', function () {
        $('#country-dropdown').toggle();
    });
    $("#country-selec-dropdown #country-dropdown ul li").click(function () {
        var selectedText = $(this).text();
        $("#country-selec-dropdown input").val(selectedText);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#country-selec-dropdown').length) {
            $('#country-dropdown').hide();
        }
    });

    // role-selec-dropdown
    $('#role-selec-dropdown').on('click', function () {
        $('#role-dropdown').toggle();
    });
    $("#role-selec-dropdown #role-dropdown ul li").click(function () {
        // var selectedText = $(this).text();
        var selectedId = $(this).data('id');
        $("#role-selec-dropdown input").val(selectedId);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#role-selec-dropdown').length) {
            $('#role-dropdown').hide();
        }
    });

    // access-selec-dropdown
    $('#access-selec-dropdown').on('click', function () {
        $('#access-dropdown').toggle();
    });
    $("#access-selec-dropdown #access-dropdown ul li").click(function () {
        // var selectedText = $(this).text();
        // var selectedText = $(this).text();
        var selectedId = $(this).data('id');
        $("#access-selec-dropdown input").val(selectedId);
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('#access-selec-dropdown').length) {
            $('#access-dropdown').hide();
        }
    });


    // chatbox-sidebar tabbing
    $('.chat-tabbs-wrap .chat-tab').click(function () {
        $('.chat-tabbs-wrap .chat-tab').removeClass('active');
        $('.chat-tabbing-content-box .chat-tabbing-sub-box').removeClass('active');
        $(this).addClass('active');
        var tab_id = $(this).index();
        tab_id += 1;
        $('.chat-tabbing-content-box .chat-tabbing-sub-box:nth-child(' + tab_id + ')').addClass('active');
    });


    // table-status-drop
    $('#status-box-dropdown').on('click', function () {
        $('#table-status-dropdown').toggle();
    });
    $('#table-status-dropdown ul li').on('click', function () {
        var selectedStatus = $(this).text();
        $('#status-box-dropdown .status').text(selectedStatus);
        if(selectedStatus == 'Completed'){
            $('#status-box-dropdown .status').removeClass('in-progress');
            $('#status-box-dropdown .status').removeClass('pending');
            $('#status-box-dropdown .status').removeClass('canceled');
            $('#status-box-dropdown .status').addClass('completed');
        }else if(selectedStatus == 'In Progress'){
            $('#status-box-dropdown .status').removeClass('completed');
            $('#status-box-dropdown .status').removeClass('pending');
            $('#status-box-dropdown .status').removeClass('canceled');
            $('#status-box-dropdown .status').addClass('in-progress');
        }else if(selectedStatus == 'Pending'){
            $('#status-box-dropdown .status').removeClass('completed');
            $('#status-box-dropdown .status').removeClass('in-progress');
            $('#status-box-dropdown .status').removeClass('canceled');
            $('#status-box-dropdown .status').addClass('pending');
        }else if(selectedStatus == 'Cancel'){
            $('#status-box-dropdown .status').removeClass('completed');
            $('#status-box-dropdown .status').removeClass('in-progress');
            $('#status-box-dropdown .status').removeClass('pending');
            $('#status-box-dropdown .status').addClass('canceled');
        }
        
       

        $('#table-status-dropdown').hide();
    });
    $("#table-status-dropdown ul li").click(function () {
        $('#table-status-dropdown').hide();
    });


    // table-status-drop
    $('#progress-wrap-dropdown').on('click', function () {
        $('#progress-status-dropdown').toggle();
    });
    $('#progress-status-dropdown ul li').on('click', function () {
        var selectedStatus = $(this).text();
        $('#progress-wrap-dropdown span').text(selectedStatus);
        selectedStatus = selectedStatus == 'Completed' ? '100%' : selectedStatus;
        $('.progress-bar .inner').css('width',selectedStatus);
        $('#progress-status-dropdown').hide();
    });
    $("#progress-status-dropdown ul li").click(function () {
        $('#progress-status-dropdown').hide();
    });


    // table-status-drop
    $('#daysboxbox').on('click', function () {
        $('#days-box-dropdown').toggle();
    });
    $('#days-box-dropdown ul li').on('click', function () {
        var selectedStatus = $(this).text();
        $('#daysboxbox p').text(selectedStatus);
        $('#days-box-dropdown').hide();
    });
    $("#days-box-dropdown ul li").click(function () {
        $('#days-box-dropdown').hide();
    });


    // dashboard-overview-task tabbing
    $('.task-tabbs .task-tab-main').click(function () {
        $('.task-tabbs .task-tab-main').removeClass('active');
        $('.task-tabbing-content .task-tab-content').removeClass('active');
        $(this).addClass('active');
        var tab_id = $(this).index();
        tab_id += 1;
        $('.task-tabbing-content .task-tab-content:nth-child(' + tab_id + ')').addClass('active');
    });

});