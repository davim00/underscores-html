// Bootstrap specific functions and styling
jQuery(document).ready(function() {
    jQuery('.comment-reply-link').addClass('btn btn-sm btn-primary');
    // Basic Styling for buttons
    jQuery('#submit, button[type=submit], html input[type=button], input[type=reset], input[type=submit]').addClass('btn btn-primary');
    // Make all tables have default padding and horizontal borders
    jQuery('table').addClass('table');
    jQuery('table#wp-calendar').addClass('table table-striped');
    // Create Media Lists out of RSS feed
    jQuery('.widget_rss ul').addClass('media-list');
    // Form control
    jQuery('.postform').addClass('form-control');
    // Widgets as panels
    jQuery('.widget ul').addClass('list-group');
    jQuery('.widget ul li').addClass('list-group-item');
    jQuery('.widget.widget_search form').addClass('panel-body');
    // Show elements immediately
    jQuery('#submit, .tagcloud, button[type=submit], .comment-reply-link, .widget_rss ul, .postform, table#wp-calendar').show("fast");
});
