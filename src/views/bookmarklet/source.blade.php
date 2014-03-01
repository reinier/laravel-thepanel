var thelink=encodeURIComponent(location.href);
var thetitle=encodeURIComponent(document.title);
window.location = "http://{{ Config::get('thepanel::site.site_domain'); }}/thepanel/add?url="+thelink+"&title="+thetitle+"&bookmarklet=true";
