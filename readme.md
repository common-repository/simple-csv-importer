
# HeadingSimple CSV Importer
Contributors: apsaraaruna 
Donate link:
https://profiles.wordpress.org/apsaraaruna/ 
Tags: custom posts,
importer, csv, acf, cfs, scf 
Requires at least: 5.4 
Tested up to: 5.8.2
Stable tag: 1.0.0 
License: GPLv2 or later 
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Alternative CSV Importer plugin. Simple and powerful, best for geeks.

## HeadingDescription 

Alternative CSV Importer plugin. Simple and powerful, best for geeks.

-   Category support
-   Tag support
-   Custom field support
-   [Smart Custom
    Fields](https://wordpress.org/plugins/smart-custom-fields/) support
-   [Custom Field Suite](http://customfieldsuite.com/) support
-   [Advanced Custom Fields](http://www.advancedcustomfields.com/)
    support
-   Custom Taxonomy support
-   Custom Post Type support
-   Filter hook for dry-run-testing
-   Filter hooks for customize csv data before importing to database
-   Action hook for update post data after importing to database

You can get example CSV files in
`/wp-content/plugins/simple-csv-importer/sample` directory.

## Available column names and values: 
* `ID` or `post_id`: (int) post id.  
This value is not required. The post ID is already exists in your blog, importer will update that post data. If the ID is not exists, importer will trying to create a new post with suggested ID.
* `post_author`: (login or ID) The user name or user ID number of the author.
* `post_date`: (string) The time of publish date.
* `post_content`: (string) The full text of the post.
* `post_title`: (string) The title of the post.
* `post_excerpt`: (string) For all your post excerpt needs.
* `post_status`: ('draft' or 'publish' or 'pending' or 'future' or 'private' or custom registered status) The status of the post. 'draft' is default.
* `post_password`: (string) The password to protect the post. The password is limited to 20 characters.
* `post_name`: (string) The slug of the post.
* `post_parent`: (int) The post parent id. Used for page or hierarchical post type.
* `menu_order`: (int)
* `post_type`: ('post' or 'page' or any other post type name) *(required)* The post type slug, not labels.
* `post_thumbnail`: (string) The uri or path of the post thumbnail.  
E.g. http://example.com/example.jpg or /path/to/example.jpg
* `post_category`: (string, comma separated) slug of post categories
* `post_tags`: (string, comma separated) name of post tags
* `tax_{taxonomy}`: (string, comma separated) Any field prefixed with `tax_` will be used as a custom taxonomy. Taxonomy must already exist. Entries are names or slugs of terms.
* `{custom_field_key}`: (string) Any other column labels used as custom field
* `cfs_{field_name}`: (string) If you would like to import data to custom fields set by Custom Field Suite, please add prefix `cfs_` to column header name.
* `scf_{field_name}`: (string) If you would like to import data to custom fields set by Smart Custom Fields, please add prefix `scf_` to column header name.
* `comment_status`: ('closed' or 'open') Default is the option 'default_comment_status', or 'closed'.

Note: Empty cells in the csv file means "keep it", not "delete it".\
Note: To set the page template of a page, use custom field key of
`_wp_page_template`.\
Note: If providing a post\_status of 'future' you must specify the
post\_date in order for WordPress to know when to publish your post.
Note: If the post\_type value is `attachment`, you can use
`post_thumbnail` field to define media URL or path.

### Advanced Custom Fields plugin integrate 
If advanced custom field key
is exists, importer will trying to use
[update\_field](http://www.advancedcustomfields.com/resources/functions/update_field/)
function instead of built-in add\_post\_meta function.\
How to find advanced custom field key: [Finding the field
key](http://www.advancedcustomfields.com/resources/functions/update_field/#finding-the%20field%20key)

### Installation 

1.  Upload All files to the `/wp-content/plugins/` directory.
2.  Activate the plugin through the 'Plugins' menu in WordPress.
3.  Go to the Import page under Tools menu.
4.  Click CSV link, read the notification, then just upload and import.

### Frequently Asked Questions ==

** Should I fill all columns of post data? **

No. Only columns which you want to update.

** Can I update existing post data? **

Yes. Please use ID field to specify the existing post.

** Can I insert post with specific post id? **

Yes. Please use ID field to specify the new post ID.

** Can I import custom field/custom taxonomy of the post? **

Yes. You can use column names same as wp\_post table, but if the column
name does not match, it creates a custom field (post meta) data.
Importing custom taxonomy is a bit more complicated, "tax\_{taxonomy}"
means, "tax\_" is prefix, and {taxonomy} is name of custom taxonomy (not
labels).

Here is an example.

**csv file**\
"post\_title","singer","genre","released\_date" "Shape of You","Ed
Sheeran","Pop", "06-01-2017"

**imported post data**\
Post Title: Shape of You\
Custom field "singer": Ed Sheeran\
Custom field "genre": Pop\
Custom taxonomy "released\_date": 06-01-2017

** Why should I quote text cells when I save csv file? **

Because PHP cannot read multibyte text cells in some cases.

> Locale setting is taken into account by this function. If LANG is e.g.
> en\_US.UTF-8, files in one-byte encoding are read wrong by this
> function.

** Can I insert multiple values to CFS or ACF fields like Select or
Checkbox? **

Yes. Please create additional plugin and use
`simple_csv_importer_save_meta` filter to make array data.

### Screenshots

### Changelog

* 1.0.0 = \* Fresh copy

### Upgrade Notice 

*  1.0.0 = Almost not updating plugin and making with suitable for
nowaday.
