function wpns_replace(str) {
	return str.replace(/_AT_NOSPAM_/, '@');
}

function wpns_parse_anchors() {
	var anchors = document.getElementsByTagName("a");
	for (var i = 0; i < anchors.length; i++) {  
		var href = anchors[i].getAttribute('href');

		if (href)
			anchors[i].setAttribute('href', wpns_replace(href));
	}
}

wpns_parse_anchors();
