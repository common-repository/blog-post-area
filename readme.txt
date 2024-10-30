=== Blog Post Area ===

Version: 1.8



The plugin allows you to put in custom post data, which can be pulled into the theme and displayed in custom formats.



== Description == 



The idea behind this plugin is to allow users to setup information in their admin panel, that will be pulled through into the
front end. It's setup to make it easy to add areas for Featured Posts, or other types of special data they want to be displayed.
(Top 5 posts, or top 10 posts, or whatever).  Very basic functionality for now. I plan to expand it greatly based off user feature
requests, and new ideas that I get.

Note: This is the beta release.  There will be bug fixes, response to feedback, and additional development coming in the near months.

Note: I have added a new widget. PLEASE NOTE this is currently only a function. I have not registered it as a usable sidebar widget. This
is coming in a near future version.


== Changelog ==


= 1.8 =

* Added line breaks into admin form, make it cleaner.
* Rewrote some of the textual instructions on that page as well.
* Added a basic widget. Right now it can return the data as a table.  Later I will add more types of formats.
* Rewrote most of the readme file as well.


= 1.4 = 

* A few more adjustments to plugin file + readme file to try to get tag data correct.



= 1.3 =

* Minor cleanup in plugin file
* Rewrote most of the readme to conform better to Wordpress standards.



= 1.0 =

* Initial Beta Release



== Installation ==



The usage is very simple. Install the plugin, under the admin panel look for the menu option "Blog Post Area Plugin".  Fill
that up with whatever data you want (instructions are on the form).  Then pull it through on the front end using either
the standard data function, or the basic widget.  The widget will have new formats added in the future.

To get the rall data call "$blogposts = blogpostarea_getdata();".  To call the widget use "widget_blogpostarea()" function.


== About Me == 


I am a Information Technology Specialist.  You can visit my website at www.infotechnologist.biz to learn more about my business.