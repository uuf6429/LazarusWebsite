Lazarus Website
---------------

The Lazarus Website source code started out by Adnan Shameem (aka Sunny).

Christian Sciberras set out to modernize the PHP codebase to make it faster, easier to maintain and cleaner.

License
-------

This source code is provided with an MIT license.

Please note that this is not a continuation of the earlier license since the source code is a complete rewrite (and not a derivation).

Features
--------

- Let's skip the better code etc argument
- Supports all of the old features...and more (of course)
- Configuration-based website that is easy to manage and consistent
- Makes use of standard compression and caching apache modules
- Clean URLs
- Error pages (instead of plain apache pages)
- Error/exception handling mechanism with graceful fallback
- ErrorReporter - get to know about the bugs before the users
- The website theme is liquid when the page width is less than 640px (effectively making it mobile friendly)
- Automatically retrieves latest Lazarus version from SF

Requirements
------------

 - cache folder must be writable (chmod 0777)
 - requires Apache mod_deflate (compression), mod_expires+mod_headers (better caching) and mod_rewrite (nice urls)
 - requires at least PHP 5.2

Todo List
---------

- Add content/body to contact page
- Convert image bullets (in home header) to real bullets (or something scalable)
- Fix slider background (switch to png especially the sloping strip, because of jpg mismatch)
- Slider doesn't look great on mobile site, do something about it
- Do some real cross-browser checks
- Ask around for inspiration on more features
- Thanks to easy SMF integration, support more pages (eg; projects page etc)

Links & Contact
---------------

 - Adnan Shameem: [email](mailto:needadnan@gmail.com) [site](http://www.adnan.co.vu/)
 - Christian Sciberras: [email](mailto:christian@sciberras.me) [site](http://christian.sciberras.me/)