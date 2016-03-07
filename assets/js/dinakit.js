(function() {
    'use strict';
    $(document).on('click', 'a[href="#"], a[role="button"]', function(e) {
        e.preventDefault();
    });

    // close alerts
    $(document).delegate(".alert-close", "click", function (t){
        t.preventDefault();
        var target = $(this).closest('.alert');
        if(target.length == 0) { return false; }
        target.fadeOut(function () {
            $(this).remove();
        });
    });

    // disable active breadcrumb item link
    $(document).on('click', '.breadcrumb > .item.active > a', function (e) {
        e.preventDefault();
        return false;
    });

    // Button Dropdown
    $(document).delegate('.btn-dropdown>.toggle-dropdown:not(:disabled)', 'click', function (e) {
        e.preventDefault();
        $(this).closest('.btn-dropdown').toggleClass('open');
    });
    $('html').click(function () {
        $('.btn-dropdown:not(:hover)').removeClass('open');
    });

    // collapse
    $(document).delegate('.collapse > .title', 'click', function (e) {
        e.preventDefault();
        var that = $(this), parent = that.closest('.collapse'), target = that.next();
        if($(target).hasClass('active')) {;
            $(target).slideUp('fast', function() {
                that.removeClass('active');
                target.removeClass('active');
            });
        } else {
            $(parent).children('.content').slideUp('fast', function () {
                $(this).removeClass('active');
                $(this).prev('.title').removeClass('active');
            });
            $(target).hide().addClass('active').slideDown('fase', function () {
                that.addClass('active');
            });
        }
    });

    // label close
    $(document).delegate('.label-close', 'click', function (e) {
        e.preventDefault();
        $(this).closest('.label').fadeOut(function () {
            $(this).remove();
        });
    });

    // badge close
    $(document).delegate('.badge-close', 'click', function (e) {
        e.preventDefault();
        $(this).closest('.badge').fadeOut(function () {
            $(this).remove();
        });
    });

    // disable pagination active item click
    $(document).on('click', '.pagination>.active>a,.pagination>.disabled>a', function (e) {
        e.preventDefault();
        return false;
    });

    // close modals
    $(document).delegate('[data-modal]', 'click', function (e) {
        e.preventDefault();
        var modal = $(this).attr('data-modal');
        if(modal.length == 0 || $(modal).hasClass('open')) { return false; }
        $(modal).addClass('open');
    });

    $(document).delegate('.modal-close', 'click', function(e){
        e.preventDefault();
        var modal = $(this).closest(".modal");
        if(modal.length == 0) { return false; }
        modal.removeClass('open').remove();
    });

    // scroll to
    $(document).delegate(".scroll","click",function (e) {
        e.preventDefault();
        var target = $(this).attr('href');
        if($(target).length == 0) { return false; }
        $("html, body").animate({ scrollTop: $(target).offset().top }, 1000);
    });

    // tabs
    $(document).delegate('.tabs > .controls > .item', 'click', function (e) {
        e.preventDefault();
        var that = $(this),
            target = $(that.attr('href')),
            controls = that.parent(),
            tabs = that.parent().parent();

        if($(target).length == 0) { return false; }
        controls.children().removeClass('active');
        that.addClass('active');
        tabs.children('.content').children().removeClass('active');
        $(target).addClass('active');
    });

    // checkbox
    $(document).on('click', '.checkbox', function (e) {
        e.preventDefault();
        var $that = $(this), $checkbox = $that.children('input[type="checkbox"]');
        if($checkbox.prop("checked")) {
            $that.removeClass('checked');
            $checkbox.prop('checked', false);
        } else {
            $that.addClass('checked');
            $checkbox.prop('checked', true);
        }
    });

    // Auto expandable textareas
    $(document).on('focus', '.auto-expand', function(e) {
        var $that = $(this)
            , minHeight = $that.innerHeight();
        $that.css({'min-height': minHeight+'px'});
        $that.baseScrollHeight = $that.scrollHeight;
    }).on('keyup', '.auto-expand', function(e) {
        var $that = $(this)
            , minHeight = $that.innerHeight()
            , newHeight = this.scrollHeight;
        if (!e || e.which == 8 || e.which == 46 || (e.ctrlKey && e.which == 88)) {
            newHeight = 0;
        }
        //this.scrollTop = 0;
        $that.css({height: newHeight});
    });
}());