<?php Page()->set_title('About Lazarus Project'); ?>

<h2>History</h2>
<p>Lazarus was started in February of 1999. It was primarily founded by three individuals:</p>
<ul>
    <li>Cliff Baeseman</li>
    <li>Shane Miller</li>
    <li>Michael A. Hess</li>
</ul>

<p>All three had attempted to get involved with the Megido project which dissolved. In frustration they started the Lazarus project. It has had a steady growth of supporters and developers during the following years. The founders are not involved with the project any more.</p>
<p>The next oldest member of the team is Marc Weustink. He got involved with the project in Aug. 1999. Following him is Mattias Gaertner who got involved in Sept. 2000. Both of them have been the major contributors to the core of what makes Lazarus tick. More about <a href="http://wiki.lazarus.freepascal.org/History">the history in the Wiki</a></p>

<h2>So just what is Lazarus?</h2>
<p>Lazarus is a Delphi compatible cross-platform IDE for Free Pascal. It includes LCL which is more or less compatible with Delphi's VCL. Free Pascal is a GPL'ed compiler that runs on Linux, Win32, OS/2, 68K and more. Free Pascal is designed to be able to understand and compile Delphi syntax, which is OOP. Lazarus is the part of the missing puzzle that will allow you to develop Delphi like programs in all of the above platforms. Unlike Java which strives to be a write once run anywhere, Lazarus and Free Pascal strives for write once compile anywhere. Since the exact same compiler is available on all of the above platforms it means you don't need to do any recoding to produce identical products for different platforms.</p>

<h2>Yeah, but what about the GUI? What widget set are you using?</h2>
<p>That is the neat part. You decide. Lazarus is being developed to be totally and completely API independent. Once you write your code you just link it against the API widget set of your choice. If you want to use GTK+, great! If you want it to be Gnome compliant, great! As long as the interface code for the widget set you want to use is available you can link to it. If it isn't available, well you can write it.</p>

<p>For example. Let's say you are creating a product on Windows using the standard Windows widgets. Now you want to create a Linux version. First you decide what widget set you want to use. Let's assume you want to use gtk+. So you copy the code over to your Linux development machine, compile, and link against the gtk+ interface unit. That's it. You've now just created a Linux version of the Windows product without any additional coding.</p>

<p>At this point in the development we are using Win32, gtk2+, Carbon and QT as our API widget set. Bindings for custom drawn components are in the works and other widget sets are planned, too.</p>


<h2>So is this thing really RAD like Delphi?</h2>
<p>It sure is. Is it totally completed? No not yet.The overall IDE is complete and can be used for most programming needs. Several aspects of the project are still in need of help. Hint. Hint.</p>

<h2>Can I use my existing Delphi code?</h2>
<p>Some of it yes. If the code is standard Delphi pascal and it uses the standard components found in Delphi then the answer is yes. If it uses some specific database, OCX, or DCU then the answer would be no. These items are specific to Windows and would only work on and within Windows. However, if you are only looking to create a Windows product using Free Pascal and Lazarus then the answer would be yes. This hasn't been added to the LCL yet but it should be possible in the future.</p>

<h2>Can I create commercial products with this?</h2>
<p>Yes. The code for the Free Pascal compiler is licensed under the GPL. This means that it is open source, free, whatever name you want to stick to it. You can modify the code if you wish but you MUST distribute those changes or make them available to others if they wish to use it.</p>

<p>The FCL (Free Pascal Component Libraries) and the LCL (which will eventually become part of the FCL) are licensed under a modified LGPL. In a nut shell this means that you can write your own proprietary software that just links to these libraries. You can sell your application without the need to supply or make available your code. However, as with the compiler if you make modifications to the FCL or LCL you must make those changes available to the general public and the world.</p>

<h2>I give up, where did the name come from?</h2>
<p>One of the original projects that made an attempt to build a Delphi clone was Megido. However this effort died. Lazarus as you know was the biblical figure that was raised from the dead by Christ. Soooooo. The project is named Lazarus as it was started/raised from the death of Megido.</p>
