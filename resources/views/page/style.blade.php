<link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/danh-sach.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
         crossorigin="anonymous">
         
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
                       .tagcloud05 ul {
	margin-left: 20px;
	padding: 0;
	list-style: none;
}
.tagcloud05 ul li {
	display: inline-block;
	margin: 0 0 .3em 1em;
	padding: 0;
}
.tagcloud05 ul li a {
	position: relative;
	display: inline-block;
	height: 30px;
	line-height: 30px;
	padding: 0 1em;
	background-color: #3498db;
	border-radius: 0 3px 3px 0;
	color: #fff;
	font-size: 13px;
	text-decoration: none;
	-webkit-transition: .2s;
	transition: .2s;
}
.tagcloud05 ul li a::before {
	position: absolute;
	top: 0;
	left: -15px;
	content: '';
	width: 0;
	height: 0;
	border-color: transparent #3498db transparent transparent;
	border-style: solid;
	border-width: 15px 15px 15px 0;
	-webkit-transition: .2s;
	transition: .2s;
}
.tagcloud05 ul li a::after {
	position: absolute;
	top: 50%;
	left: 0;
	z-index: 2;
	display: block;
	content: '';
	width: 6px;
	height: 6px;
	margin-top: -3px;
	background-color: #fff;
	border-radius: 100%;
}
.tagcloud05 ul li span {
	display: block;
	max-width: 100px;
	white-space: nowrap;
	text-overflow: ellipsis;
	overflow: hidden;
}
.tagcloud05 ul li a:hover {
	background-color: #555;
	color: #fff;
}
.tagcloud05 ul li a:hover::before {
	border-right-color: #555;
}
    </style>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">