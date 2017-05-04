#URL Shortener

## Live URL
<http://p4-dfischer.rhcloud.com>

## Description

My project is a URL shortener that accepts user links and creates a 6 character random key which can be appended to the site in order to visit the full URL. This service was inspired by other URL shorteners, namely <http://goo.gl> and <http://bit.ly>. 

Users can create an account in order to access special features, such as guaranteed unique keys and an account page to view all their redirects. 

Statistics can be tracked for URLS, currently only the number of hits is visible but creation date and last visited dates are planned (Once I figure out carbon sytnax for timestamps). 

## Info for Teaching Team

My project uses two tables, one for storing redirects and one for storing users. There is a one-to-many relationship between users and redirects, as users are able to track their own shortened keys. 

The CSS is made from scratch and I tried to make the site as minimal as possible yet still functional. I took some design inspiration from Google's "Cards UI" which can be seen on some pages. 

## Outside Code
* Laravel Framework: <http://laravel.com>
* Google Fonts: <https://www.google.com/fonts>
* Site Title Function: <http://stackoverflow.com/questions/4348912/get-title-of-website-via-link>
