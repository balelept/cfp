Bootsnipp
Bootstrap For
+ New Snippet
Tools
Snippets
Register
Login

"responsive sidebar menu - modified"
Bootstrap 3.3.0 Snippet by gnumoksha
3.3.0 jQuery menu sidebar responsive
PreviewHTMLCSSJS       Fork   44.9K    21 Fav


1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
function htmlbodyHeightUpdate() {
    var height3 = $(window).height();
    var height1 = $('.nav').height() + 50;
    height2 = $('.container-main').height();
    if (height2 > height3) {
        $('html').height(Math.max(height1, height3, height2) + 10);
        $('body').height(Math.max(height1, height3, height2) + 10);
    } else
    {
        $('html').height(Math.max(height1, height3, height2));
        $('body').height(Math.max(height1, height3, height2));
    }
}
$(document).ready(function () {
    htmlbodyHeightUpdate();
    $(window).resize(function () {
        htmlbodyHeightUpdate();
    });
    $(window).scroll(function () {
        height2 = $('.container-main').height();
        htmlbodyHeightUpdate();
    });
});
Similar snippets: See More
7.9K  12
Responsive 2 column Timeline (S.G. modified version)


293.0K  181
Responsive Sidebar Menu

 Responsive Sidebar Menu
53.7K  22
Responsive menu sidebar

 Responsive menu sidebar
1.5K  0
Responsive Offcanvas Sidebar Menu

 Responsive Offcanvas Sidebar Menu
Comments:
Commenting will be back soon.

 Follow @bootsnipp  Tweet
Bootsnipp.com © 2017 Dan's Tools | Site Privacy policy | Advertise | Featured snippets are MIT license.
