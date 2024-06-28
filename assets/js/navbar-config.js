function toggleDropdown(e) {
    const _d = $(e.target).closest('.dropdown'),
        _m = $('.dropdown-menu', _d);

    if (e.type === 'click') {
        // Toggle dropdown on click
        _m.toggleClass('show');
        _d.toggleClass('show');
        $('[data-toggle="dropdown"]', _d).attr('aria-expanded', _d.hasClass('show'));
    } else if (e.type === 'mouseenter') {
        // Do nothing on mouse enter
    } else if (e.type === 'mouseleave') {
        _m.toggleClass('show');
        _d.toggleClass('show');
        $('[data-toggle="dropdown"]', _d).attr('aria-expanded', _d.hasClass('show'));    
        // Close dropdown immediately on mouse leave
        // if (!_d.hasClass('show')) return; // Only close if it was opened by click
        // _m.removeClass('show');
        // _d.removeClass('show');
        // $('[data-toggle="dropdown"]', _d).attr('aria-expanded', false);
    }
}

$('body')
    .on('mouseenter', '.dropdown', toggleDropdown)
    .on('mouseleave', '.dropdown', toggleDropdown)
    .on('click', '[data-toggle="dropdown"]', toggleDropdown)
    .on('click', '.dropdown-menu a', function (e) {
        // Prevent the menu from closing when clicking on menu items
        e.stopPropagation();
    });