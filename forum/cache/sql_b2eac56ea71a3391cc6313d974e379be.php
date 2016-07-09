<?php exit; ?>
1468053200
SELECT s.style_id, c.theme_id, c.theme_data, c.theme_path, c.theme_name, c.theme_mtime, i.*, t.template_path FROM phpbb_styles s, phpbb_styles_template t, phpbb_styles_theme c, phpbb_styles_imageset i WHERE s.style_id = 2 AND t.template_id = s.template_id AND c.theme_id = s.theme_id AND i.imageset_id = s.imageset_id
89333
a:1:{i:0;a:11:{s:8:"style_id";s:1:"2";s:8:"theme_id";s:1:"3";s:10:"theme_data";s:88934:"/*  phpBB3 Style Sheet
    --------------------------------------------------------------
	Style name:			Ariki
	Based on style:		prosilver (the default phpBB 3.0.x style)
	Original author:	Gramziu
	Modified by:		
    --------------------------------------------------------------
*/

/* General Markup Styles
---------------------------------------- */
* { margin: 0; padding: 0; }
*, *:before, *:after {
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}

html { height: 101%; }

body {
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	font-size: 10px;
	margin: 0;
	padding: 0;
}

/* Forum name */
h1 {
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	margin: 0 0 20px;
	font-weight: 400;
	font-size: 2.1em;
	letter-spacing: -1px;
}

/* Forum header titles */
h2 {
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	font-weight: 300;
	font-size: 3.2em;
	margin: 0 0 40px;
	letter-spacing: -1px;
}

/* Sub-headers and post headers */
h3 {
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	font-weight: 700;
	font-size: 1.8em;
	margin: 0 0 40px;
}

/* Forum and topic list titles */
h4 {
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	font-size: 1.3em;
}

p { line-height: 1.5; margin-bottom: 20px; }
p.right { text-align: right; }
p.subtitle { font-size: 1.1em; margin-top: -30px; margin-bottom: 40px; }

img { border-width: 0; }
ul, ol { list-style-position: inside; }
ul > ul { margin-left: 20px; }

hr {
	border-width: 0;
	border-style: none;
	border-top-width: 1px;
	border-top-style: solid;
	height: 1px;
	margin: 10px 0;
	display: block;
	clear: both;
}
hr.dashed { border-top-style: dashed; border-top-width: 1px; }
hr.divider { display: none; }

form {
	border: none;
	padding: 0;
	margin: 0;
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
}

fieldset {
	border: none;
	padding: 0;
	margin: 0;
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
}

input {
	border: none;
	padding: 0;
	margin: 0;
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	font-size: 1em;
	outline: none;
	border-radius: 0;
}
input:active,
input:focus {
	outline: none;
}

textarea {
	border: none;
	padding: 0;
	margin: 0;
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	outline: none;
	border-radius: 0;
}

select {
	border: none;
	margin: 0;
	font-family: "Open Sans", Arial, Helvetica, sans-serif;
	font-size: 1.091em;
	height: 35px;
	width: auto;
	padding: 8px;
	cursor: pointer;
	vertical-align: top;
	outline: none;
	border-radius: 0;
}

label + label { margin-left: 10px; }
label > input { margin-right: 5px; }

*::-webkit-input-placeholder	{ opacity: 1; }
*:-moz-placeholder				{ opacity: 1; }
*::-moz-placeholder				{ opacity: 1; }
*:-ms-input-placeholder			{ opacity: 1; }

textarea,
select,
input[type="text"],
input[type="button"],
input[type="submit"],
input[type="reset"] {
	-webkit-appearance: none;
}

/* General form styles
----------------------------------------*/
#jumpbox {
	height: 35px;
	line-height: 35px;
	border-radius: 3px;
	padding: 0 0 0 20px;
	font-size: 1.1em;
	float: right;
	display: block;
	overflow: hidden;
	margin-bottom: 20px;
}
#jumpbox label { margin-right: 20px; }
#jumpbox select {
	padding: 8px;
	cursor: pointer;
	vertical-align: top;
	box-shadow: none;
	transition: background-color 0.15s ease;
}
#jumpbox input {
	padding: 0 20px;
	cursor: pointer;
	height: 35px;
	margin-left: 0;
	vertical-align: top;
	border-radius: 0 3px 3px 0 !important;
	transition: background-color 0.15s ease;
}

#register_lang {
	height: 35px;
	line-height: 35px;
	border-radius: 3px;
	padding: 0 0 0 20px;
	font-size: 1.1em;
	float: right;
	display: block;
	overflow: hidden;
	margin-bottom: 20px;
}
#register_lang label { margin-right: 20px; }
#register_lang select {
	padding: 8px;
	cursor: pointer;
	vertical-align: top;
	box-shadow: none;
	transition: background-color 0.15s ease;
}

.forum-selection, .forum-selection2 {
	height: 35px;
	line-height: 35px;
	border-radius: 3px;
	padding: 0 0 0 20px;
	font-size: 1.1em;
	float: right;
	display: block;
	overflow: hidden;
	margin-bottom: 20px;
}
.forum-selection2 { padding: 0; }
.forum-selection select, .forum-selection2 select {
	padding: 8px;
	cursor: pointer;
	margin-left: 20px;
	transition: background-color 0.15s ease;
}
.forum-selection input, .forum-selection2 input {
	padding: 0 10px;
	height: 35px;
	margin-left: 0 !important;
	transition: background-color 0.15s ease;
	cursor: pointer;
}
.forum-selection input:last-child, .forum-selection2 input:last-child {
	border-radius: 0 3px 3px 0;
}

.quickmod {
	height: 35px;
	line-height: 35px;
	border-radius: 3px;
	padding: 0 0 0 20px;
	font-size: 1.1em;
	float: right;
	display: block;
	overflow: hidden;
	margin-bottom: 20px;
}
.quickmod label { margin-right: 20px; }
.quickmod select {
	padding: 8px;
	cursor: pointer;
	box-shadow: none;
	transition: background-color 0.15s ease;
}
.quickmod input {
	padding: 0 20px !important;
	cursor: pointer;
	height: 35px;
	margin-left: 0 !important;
	border-radius: 0 3px 3px 0 !important;
	transition: background-color 0.15s ease;
}

.quick-login label { line-height: 2; }
.quick-login #username, .quick-login #password { width: 100%; margin-bottom: 10px; }

.display-options {
	width: 100%;
	line-height: 35px;
	margin-bottom: 0;
	font-size: 1.1em;
	text-align: center;
}
fieldset.display-options > * {
	margin-bottom: 20px;
}
.display-options > fieldset > * {
	margin-bottom: 20px;
}
.display-options select {
	padding: 8px;
	margin-left: 20px;
	cursor: pointer;
	border-radius: 3px;
	transition: background-color 0.15s ease;
}
.display-options label {
	display: inline-block;
	margin-right: 20px;
	margin-left: 0;
}
.display-options label:last-child { margin-right: 0; }
.display-options input {
	height: 35px;
	cursor: pointer;
	padding: 0 20px;
	margin: 0;
	border-radius: 3px;
	transition: background-color 0.15s ease;
}
.display-options .left-box,
.display-options .right-box {
	font-size: 1em;
}

.display-actions {
	width: 100%;
	height: 35px;
	line-height: 35px;
	margin-bottom: 20px;
	font-size: 1.1em;
	text-align: left;
	text-align: right;
	float: right;
}
.content .display-actions { font-size: 0.786em; }
.display-actions input {
	height: 35px;
	cursor: pointer;
	padding: 0 10px;
	border-radius: 3px;
	transition: background-color 0.15s ease;
	float: left;
	margin-left: 20px;
}
.display-actions input:first-child,
.display-actions input:only-child {
	margin-left: 0;
}
.display-actions select {
	vertical-align: top;
	float: left;
	border-radius: 3px;
}
.display-actions .mark-unmark { margin-left: 20px; display: inline-block; }
.display-actions .mark-unmark a {
	height: 35px;
	cursor: pointer;
	padding: 0 10px;
	transition: background-color 0.15s ease;
	float: left;
}
.display-actions .mark-unmark a:first-child { border-radius: 3px 0 0 3px; }
.display-actions .mark-unmark a:last-child { border-radius: 0 3px 3px 0; }

.display-actions .left {
	float: left;
	height: 35px;
	line-height: 35px;
	font-size: 1.1em;
	margin-right: 20px;
}
.display-actions .left > * {
	float: left;
}

dl.details {
	width: 100%;
	margin-bottom: 20px;
	clear: both;
}
dl.details:after {
	clear: both;
	content: "";
	display: block;
}
dl.details > dt {
	width: 30%;
	text-align: right;
	padding-right: 10px;
	line-height: 35px;
	float: left;
}
dl.details > dt > span {
	line-height: 1.5;
	display: block;
}
dl.details > dd {
	margin-left: 30%;
	width: 70%;
	text-align: left;
	padding-left: 10px;
	line-height: 35px;
}

dl.profile-details {
	width: 85%;
	float: left;
	clear: none;
}
dl.profile-details-avatar {
	width: 15%;
	float: left;
	text-align: center;
}

fieldset dl {
	width: 100%;
	margin-bottom: 20px;
	clear: both;
}
fieldset dl:after {
	clear: both;
	content: "";
	display: block;
}
fieldset dt {
	width: 30%;
	text-align: right;
	padding-right: 10px;
	line-height: 35px;
	float: left;
}
fieldset dt > span {
	line-height: 1.5;
	display: block;
}
fieldset dd {
	margin-left: 30%;
	width: 70%;
	text-align: left;
	padding-left: 10px;
	line-height: 35px;
}
fieldset .inputbox {
	padding: 8px;
	border: none;
	width: 50%;
	font-size: 1em;
	transition: background-color 0.15s ease;
}

select + input[type="submit"],
label + input[type="submit"],
input + input[type="submit"] {
    border-radius: 3px;
    cursor: pointer;
    height: 35px;
    margin-left: 20px;
    padding: 0 20px;
    transition: background-color 0.15s ease 0s;
}

fieldset select {
	border: none;
	transition: background-color 0.15s ease;
}

.fields1 { margin-bottom: 20px; }
.fields1 dl {
	width: 100%;
	margin-bottom: 20px;
	clear: both;
}
.fields1 dl:after {
	clear: both;
	content: "";
	display: block;
}
.fields1 dt {
	width: 25%;
	text-align: right;
	padding-right: 10px;
	line-height: 35px;
	float: left;
}
.fields1 dd {
	margin-left: 25%;
	width: 75%;
	text-align: left;
	padding-left: 10px;
	line-height: 35px;
}
.fields1 .inputbox {
	padding: 8px;
	border: none;
	width: auto;
	transition: background-color 0.15s ease;
}

#edit_reason { width: 75%; }
#width, #height { width: auto; }
#qr_showeditor_div { margin-bottom: 20px; }
#bday_day, #bday_month, #bday_year { min-width: 60px; }

/* Link Styles
---------------------------------------- */
a {
	direction: ltr;
	unicode-bidi: embed;
	transition: color 0.15s ease;
}

/* CSS spec requires a:link, a:visited, a:hover and a:active rules to be specified in this order. */
a:link	{ text-decoration: none; }
a:visited	{ text-decoration: none; }
a:hover	{ text-decoration: none; }
a:active	{ text-decoration: none; outline: none; }
a:focus	{ text-decoration: none; outline: none; }

a[style*="color"]:hover { text-decoration: underline; }
.username-coloured:hover { text-decoration: underline; }

/* Data Tooltips
---------------------------------------- */
[data-tooltip] {
	position: relative;
	text-decoration: none;
}
[data-tooltip]:after, [data-tooltip]:before {
	position: absolute;
	z-index: 100;
	opacity: 0;
	transition: opacity 0.15s ease;
	bottom: 100%;
	left: -9999px;
	margin-bottom: 10px;
}
[data-tooltip]:after {
	content: attr(data-tooltip);
	height: 25px;
	line-height: 25px;
	padding: 0 10px;
	font-size: 11px;
	text-align: center;
	border-radius: 2px 2px 2px 0;
	white-space: nowrap;
}
[data-tooltip]:before {
	content: "";
	width: 0;
	height: 0;
	border-width: 10px 0 0 9px;
	border-style: solid;
	margin-bottom: 0;
}
[data-tooltip]:hover:after, [data-tooltip]:hover:before {
	opacity: 1;
	left: 0;
}

/* Links with specitif direction
---------------------------------------- */
.left-box:before { 
	font-family: "FontAwesome";
	content: "\f060";
	margin-right: 10px;
}
.left-box { 
	float: left;
	height: 35px;
	line-height: 35px;
	font-size: 1.1em;
	margin-right: 20px;
}

.right-box:after { 
	font-family: "FontAwesome";
	content: "\f061";
	margin-left: 10px;
}
.right-box { 
	float: right;
	height: 35px;
	line-height: 35px;
	font-size: 1.1em;
	margin-left: 20px;
}
span.right { 
	float: right;
	margin-left: 20px;
}

.right-box-up:after { 
	font-family: "FontAwesome";
	content: "\f062";
	margin-left: 10px;
}
.right-box-up { 
	float: right;
	height: 35px;
	line-height: 35px;
	font-size: 1.1em;
}

/* Main blocks
---------------------------------------- */
.wrap {
	margin: 0 auto;
	max-width: 1200px;
}

#simple-wrap {
	padding: 20px;
}

.column1 {
	width: 50%;
	float: left;
	padding-right: 10px;
}
.column2 {
	width: 50%;
	float: left;
	padding-left: 10px;
}

.column1 > *:last-child, .column2 > *:last-child { margin-bottom: 0; }

.c-wrap:after { clear: both; display: block; content: ""; }

.c1:first-child, .c2:first-child, .c3:first-child, .c4:first-child, .c5:first-child,
.c6:first-child, .c7:first-child, .c8:first-child, .c9:first-child {
	padding-left: 0;
}
.c1:last-child, .c2:last-child, .c3:last-child, .c4:last-child, .c5:last-child,
.c6:last-child, .c7:last-child, .c8:last-child, .c9:last-child {
	padding-right: 0;
}

.c1-5:first-child, .c2-5:first-child, .c3-5:first-child, .c4-5:first-child, .c5-5:first-child,
.c6-5:first-child, .c7-5:first-child, .c8-5:first-child {
	padding-left: 0;
}
.c1-5:last-child, .c2-5:last-child, .c3-5:last-child, .c4-5:last-child, .c5-5:last-child,
.c6-5:last-child, .c7-5:last-child, .c8-5:last-child {
	padding-right: 0;
}

.c3-3:first-child {
	padding-left: 0;
}
.c3-3:last-child {
	padding-right: 0;
}

.c1 {
	width: 10%;
	float: left;
	padding: 0 10px;
}
.c2 {
	width: 20%;
	float: left;
	padding: 0 10px;
}
.c3 {
	width: 30%;
	float: left;
	padding: 0 10px;
}
.c4 {
	width: 40%;
	float: left;
	padding: 0 10px;
}
.c5 {
	width: 50%;
	float: left;
	padding: 0 10px;
}
.c6 {
	width: 60%;
	float: left;
	padding: 0 10px;
}
.c7 {
	width: 70%;
	float: left;
	padding: 0 10px;
}
.c8 {
	width: 80%;
	float: left;
	padding: 0 10px;
}
.c9 {
	width: 90%;
	float: left;
	padding: 0 10px;
}

.c3-3 {
	width: 33.3333%;
	float: left;
	padding: 0 10px;
}

.c1-5 {
	width: 15%;
	float: left;
	padding: 0 10px;
}
.c2-5 {
	width: 25%;
	float: left;
	padding: 0 10px;
}
.c3-5 {
	width: 35%;
	float: left;
	padding: 0 10px;
}
.c4-5 {
	width: 45%;
	float: left;
	padding: 0 10px;
}
.c5-5 {
	width: 55%;
	float: left;
	padding: 0 10px;
}
.c6-5 {
	width: 65%;
	float: left;
	padding: 0 10px;
}
.c7-5 {
	width: 75%;
	float: left;
	padding: 0 10px;
}
.c8-5 {
	width: 85%;
	float: left;
	padding: 0 10px;
}

/* Horizontal lists
----------------------------------------*/
#tabs {
	width: auto;
	height: 45px;
}
#tabs > ul { list-style: none; }
#tabs > ul > li > a {
	float: left;
	line-height: 45px;
	height: 45px;
	padding: 0 20px;
	position: relative;
}
#tabs > ul > li > a:after {
	content: "";
	width: 0;
	height: 0;
	border-width: 10px 10px 0 9px;
	border-style: solid;
	margin-bottom: 0;
	z-index: 999;
	position: absolute;
	bottom: 0;
	left: 50%;
	margin-left: -10px;
	transition: bottom 0.15s ease;
}
#tabs > ul > li.activetab > a:after, #tabs > ul > li > a:hover:after { bottom: -10px; }

/* Table styles
----------------------------------------*/
.table1 {
	clear: both;
	margin-bottom: 20px;
	width: 100%;
}
.forumbg .table1 { box-shadow: none; }
.table1 thead {
	height: 45px;
	list-style: none;
	font-size: 1.2em;
	line-height: 45px;
}
.table1 thead th { font-weight: 400; padding: 0 20px; }

.table1 tbody {
	list-style: none;
	font-size: 1.3em;
	line-height: 1.5;
}
.table1 tbody td { padding: 20px; }

/* Specific column styles */
.table1 .name			{ text-align: left; }
.table1 .posts			{ text-align: center !important; width: 7%; }
.table1 .joined			{ text-align: left; width: 15%; }
.table1 .active			{ text-align: left; width: 15%; }
.table1 .mark			{ text-align: center; width: 7%; }
.table1 .info			{ text-align: left; width: 30%; }
.table1 .info div		{ width: 100%; white-space: normal; overflow: hidden; }
.table1 .autocol		{ line-height: 1.8em; white-space: nowrap; }
.table1 thead .autocol	{ padding-left: 1em; }

.table1 span.rank-img {
	float: right;
	width: auto;
}
.info td {
	padding: 3px;
}
.info tbody th {
	padding: 3px;
	text-align: right;
	vertical-align: top;
	font-weight: normal;
}

/* Misc layout styles
---------------------------------------- */
.secondary-block {
	margin-bottom: 20px;
}
.secondary-block-header {
	height: 45px;
	font-size: 1.2em;
	line-height: 45px;
	padding: 0 20px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.secondary-block-header h3 {
	font-weight: 400;
	font-size: 1em;
	margin: 0;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.secondary-block-content {
	padding: 20px;
	font-size: 1.3em;
}
.secondary-block-content *:last-child {
	margin-bottom: 0;
}

.mono-block {
	margin-bottom: 20px;
}
.mono-block-header {
	height: 45px;
	font-size: 1.2em;
	line-height: 45px;
	padding: 0 20px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.mono-block-header h3 {
	font-weight: 400;
	font-size: 1em;
	margin: 0;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.mono-block-content {
	padding: 20px;
	font-size: 1.3em;
}

.info-block {
	padding: 20px;
	margin-bottom: 20px;
	font-size: 1.3em;
	line-height: 1.5;
}

#board-disabled {
	padding: 20px;
	margin-bottom: 40px;
	margin-top: -40px;
	font-size: 1.3em;
	line-height: 1.5;
}

.error {
	font-weight: 700;
	margin-bottom: 5px;
}

/* Pagination
---------------------------------------- */
.pagination {
	float: right;
	margin-right: 0 !important;
	margin-left: 20px;
	font-size: 1.1em;
	border-radius: 3px;
	overflow: hidden;
}
.pagination .page-sep { display: none; }
.pagination > .count { padding: 0; }
.pagination > .count > a,
.pagination > .count > strong,
.pagination > .count > .page-dots {
	height: 35px;
	padding: 0 20px;
	display: block;
	float: left;
	font-weight: 400;
	transition: background-color 0.15s ease;
}
.pagination > span, .pagination > a {
	height: 35px;
	padding: 0 20px;
	display: block;
	float: left;
	transition: background-color 0.15s ease;
}

.forumbg-content .pagination {
	font-size: 0.846em;
	font-weight: 400;
}
.forumbg-content .pagination > span {
	height: 30px;
	padding: 0;
}
.forumbg-content .pagination > span > .page-dots,
.forumbg-content .pagination > span > a {
	height: 30px;
	line-height: 30px;
	padding: 0 10px;
	display: block;
	float: left;
	transition: background-color 0.15s ease;
}

/* Miscellaneous styles
---------------------------------------- */
.skiplink { display: none; }
.clear { clear: both; }
.hidden { display: none; }

/* Button Styles
---------------------------------------- */
.btn {
	display: inline-block;
	float: left;
}
.btn > a, .btn > input {
	border-radius: 3px;
	height: 35px;
	line-height: 35px;
	padding: 0 20px;
	display: block;
	font-size: 1.1em;
	cursor: pointer;
}
.btn > a > i, .btn > input > i { font-size: 12px; margin-right: 10px; }

dd * + .btn { margin-left: 20px; }
dd .btn { float: none; vertical-align: top; }
input[type="hidden"] + .btn { margin-left: 0; }

.btn-post > a {
	border-bottom-style: solid;
	border-bottom-width: 2px;
	line-height: 33px;
	transition:
		border-bottom-color 0.15s ease,
		background-color 0.15s ease;
}
.btn-post:active > a {
	line-height: 35px;
}

.btn-reply > a {
	border-bottom-style: solid;
	border-bottom-width: 2px;
	line-height: 33px;
	transition:
		border-bottom-color 0.15s ease,
		background-color 0.15s ease;
}
.btn-reply:active > a {
	line-height: 35px;
}

.btn-normal > a, .btn-normal > input {
	border-radius: 3px;
	height: 35px;
	line-height: 35px;
	padding: 0 10px;
	transition: background-color 0.15s ease;
}

.btn-big > a, .btn-big > input {
	border-radius: 3px;
	height: 45px;
	line-height: 45px;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}

.btn-s-big { width: 100%; }
.btn-s-big > a, .btn-s-big > input {
	display: block;
	width: 300px;
	height: 45px;
	line-height: 45px;
	margin-bottom: 20px;
	margin: 0 auto;
	font-size: 1.1em;
	border-radius: 3px;
	cursor: pointer;
	transition: background-color 0.15s ease;
}

/* Specific button styles */
#qr_editor_div > .content #message-box > textarea { width: 100%; font-size: 1em; }
#qr_editor_div > .content #message-box { margin-bottom: 20px; }
#qr_editor_div > .content > .submit-buttons { float: left; }
#qr_editor_div > .content > .right-box-up { font-size: 1em; margin-top: 10px; }

.quick-login .btn, .quick-login .btn > input { width: 100%; }
.quick-login .btn { margin-top: 10px; }

.content > .submit-buttons { margin-bottom: 0; }

.submit-buttons { margin-bottom: 20px; }
.submit-buttons > .btn { margin-right: 20px; }
.submit-buttons > .btn:last-child { margin-right: 0; }

#format-buttons > div {
	width: 100%;
	min-height: 45px;
}
#format-buttons > div > input {
	height: 45px;
	line-height: 45px;
	padding: 0 15px;
	transition: background-color 0.15s ease;
	cursor: pointer;
	width: auto !important;
}
#format-buttons > div > select {
	height: 45px;
	padding: 13px;
	vertical-align: top;
	transition: background-color 0.15s ease;
	cursor: pointer;
}

/* Font size fixes */
.content .btn > a, .content .btn > input { font-size: 0.786em; }
.quick-login .btn > input { font-size: 1em; }

/* Content Styles
---------------------------------------- */
.forabg {
	clear: both;
	margin-bottom: 20px;
}

.forabg-header {
	height: 45px;
	list-style: none;
	font-size: 1.2em;
	line-height: 45px;
	padding: 0 20px;
}
.forabg-header dt, .forabg-header dd { float: left; }
.forabg-header dt { width: 55%; }
.forabg-header .topics-posts {
	width: 20%;
	text-align: center;
	padding-left: 20px;
}
.forabg-header .lastpost {
	width: 25%;
	padding-left: 20px;
}

.forabg-content {
	list-style: none;
	font-size: 1.1em;
	line-height: 1.5;
}
.forabg-content dl {
	min-height: 42px;
	background-repeat: no-repeat;
	background-position: 7px center;
}
.forabg-content dl:after {
    clear: both;
    content: "";
    display: block;
}
.forabg-content dt { font-size: 1.182em; line-height: 1.5; }
.forabg-content dt > .forumtitle { font-weight: 700; line-height: 1; }
.forabg-content dt > .forumtitle:link,
.forabg-content dt, .forabg-content dd { float: left; }
.forabg-content dt { width: 55%;}
.forabg-content dl.icon > dt { padding-left: 70px; padding-right: 20px; }
.forabg-content dt > i { font-size: 11px; margin-right: 7px; }
.forabg-content dfn { display: none; }
.forabg-content .topics-posts {
	width: 20%;
	text-align: center;
	padding-left: 20px;
}
.forabg-content .lastpost {
	width: 25%;
	padding-left: 20px;
}
.forabg-content .lastpost i { font-size: 10px; }
.forabg-content .redirect {
	width: 45%;
	text-align: center;
	padding-left: 20px;
}
.forabg-content > li {
	min-height: 82px;
	padding: 20px;
}

.forumbg {
	clear: both;
	margin-bottom: 20px;
}

.forumbg-header {
	height: 45px;
	list-style: none;
	font-size: 1.2em;
	line-height: 45px;
	padding: 0 20px;
}
.forumbg-header dt, .forumbg-header dd { float: left; }
.forumbg-header dt { width: 55%; }
.forumbg-header .posts-views {
	width: 20%;
	text-align: center;
	padding-left: 20px;
}
.forumbg-header .lastpost {
	width: 25%;
	padding-left: 20px;
}

.forumbg-content {
	list-style: none;
	font-size: 1.1em;
	line-height: 1.5;
}
.forumbg-content dl {
	min-height: 42px;
	background-repeat: no-repeat;
	background-position: 7px center;
}
.forumbg-content dl:after {
    clear: both;
    content: "";
    display: block;
}
.forumbg-content dt { font-size: 1.182em; line-height: 1.5; }
.forumbg-content dt > .topictitle { font-weight: 700; line-height: 1; }
.forumbg-content dt > .topictitle:link,
.forumbg-content dt, .forumbg-content dd { float: left; }
.forumbg-content dt { width: 55%; }
.forumbg-content dl.icon > dt { padding-left: 70px; padding-right: 20px; }
.forumbg-content dt > i { font-size: 11px; margin-right: 7px; }
.forumbg-content dt > i.fa-paperclip { font-size: 14px; }
.forumbg-content dfn { display: none; }
.forumbg-content .posts-views {
	width: 20%;
	text-align: center;
	padding-left: 20px;
}
.forumbg-content .lastpost {
	width: 25%;
	padding-left: 20px;
}
.forumbg-content .lastpost i { font-size: 10px; }
.forumbg-content > li {
	min-height: 82px;
	padding: 20px;
	position: relative;
}

.new-post i {
	font-size: 14px;
}

.unapproved-link {
	border-radius: 3px;
	float: left;
	font-size: 17px;
	height: 36px;
	line-height: 36px;
	margin-right: 10px;
	padding: 0 10px;
	margin-top: 3px;
}

.reported-link {
	border-radius: 3px;
	float: left;
	font-size: 17px;
	height: 36px;
	line-height: 36px;
	margin-right: 10px;
	padding: 0 10px;
	margin-top: 3px;
}

.topic-actions {
	margin-bottom: 0;
	line-height: 35px;
}
.topic-actions > * { margin-right: 20px; margin-bottom: 20px; }
.topic-actions:after {
	clear: both;
	content: "";
	display: block;
}

.actions {
	margin-bottom: 0;
	line-height: 35px;
	font-size: 1.1em;
}
.actions > * { margin-right: 20px; margin-bottom: 20px; }
.actions:after {
	clear: both;
	content: "";
	display: block;
}
.actions > ul {
	list-style: none;
	float: left;
	border-radius: 3px;
}
.actions > ul > li { float: left; }
.actions > ul > li > a {
	height: 35px;
	float: left;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}
.actions > ul > li:first-child > a { border-radius: 3px 0 0 3px; }
.actions > ul > li:last-child > a { border-radius: 0 3px 3px 0; }
.actions > ul > li:only-child > a { border-radius: 3px; }
.actions > ul > li.char > a { padding: 0 10px; }
.panel > .content > .actions { font-size: 1em; }

.panel > .content > .actions:last-child > *:last-child,
.panel > .content > .topic-actions:last-child > *:last-child,
.panel > .content > .display-actions:last-child > *:last-child {
	margin-bottom: 0;
}

.topiclist { list-style: none; }

.search {
	height: 35px;
	display: block;
	width: 300px;
	float: left;
	border-radius: 3px;
	font-size: 1.1em;
	overflow: hidden;
}
.search .keywords::-webkit-input-placeholder { opacity: 1; }
.search .keywords:-moz-placeholder { opacity: 1; }
.search .keywords::-moz-placeholder { opacity: 1; }
.search .keywords:-ms-input-placeholder { opacity: 1; }
.search .keywords {
	display: block;
	font-size: 1em;
	width: 260px;
	float: left;
	padding: 9.5px;
	height: 35px;
	transition: background-color 0.15s ease;
}
.search .button {
	height: 35px;
	display: block;
	font-size: 14px;
	width: 40px;
	float: left;
	font-family: "FontAwesome";
	cursor: pointer;
	margin: 0;
	padding: 0;
	border-radius: 0;
	transition: background-color 0.15s ease;
}

#search_forum { height: 150px; padding: 0; }
#search_forum option {
	transition: background-color 0.15s ease;
	padding: 2px 12px;
}

.panel {
	margin-bottom: 20px;
	position: relative;
}

.panel > .content {
	padding: 20px;
	font-size: 1.3em;
}
.panel > .content:after {
	clear: both;
	content: "";
	display: block;
}
.panel > .content > h2 {
	font-size: 2.462em;
}
.panel > .content > h3, .panel > .content > .column1 > h3, .panel > .content > .column2 > h3 {
	font-size: 1.385em;
}
.panel > .content > *:last-child,
.panel > .content > fieldset > *:last-child {
	margin-bottom: 0 !important;
}
.panel > .content input,
.panel > .content select {
	font-size: 0.923em;
}
.panel > .content .btn > input,
.panel > .content .btn > select,
.panel > .content .btn > a {
	font-size: 0.846em;
}

.mono-block-content input,
.mono-block-content select,
.mono-block-content a {
	font-size: 0.923em;
}

.panel:hover > .back2top { opacity: 1; }
.panel > .back2top {
	bottom: 0;
	position: absolute;
	right: -30px;
	text-align: center;
	width: 30px;
	height: 30px;
	line-height: 30px;
	overflow: hidden;
	border-radius: 0 3px 3px 0;
	opacity: 0;
	transition: opacity 0.15s ease;
}
.panel > .back2top > a {
	height: 30px;
	line-height: 30px;
	width: 30px;
	display: block;
}

#topicreview .panel > .back2top,
#topicreview .post > .back2top {
	right: 0;
	bottom: 0;
	border-radius: 3px 0 0 0;
}

.content {
	word-wrap: break-word;
	line-height: 1.5;
}

.content > img {
	max-width: 100%;
}

.faq {
	border-bottom-width: 1px;
	border-bottom-style: dashed;
	margin-bottom: 20px;
	padding-bottom: 20px;
}
.faq:last-child {
	border-bottom: none;
	padding-bottom: 0;
}

.jump2post {
	position: absolute;
	right: 0;
	bottom: 0;
}
.jump2post a {
	height: 30px;
	line-height: 30px;
	padding: 0 20px;
	width: auto;
	display: block;
	display: inline-block;
	border-radius: 3px 0 0 0;
	transition:
		background-color 0.15s ease,
		color 0.15s ease;
}

/* Post body styles
----------------------------------------*/
.post {
	margin-bottom: 20px;
	position: relative;
}
.postbody {
	width: auto;
	float: none;
	padding: 20px;
	margin-right: 200px;
	font-size: 1.3em;
}
.postbody .content { min-height: 200px; overflow: hidden; }
.postbody .content ul { line-height: 1.5; }
.postbody .right-box {
	font-size: 0.786em;
	margin-left: 20px;
	line-height: 1.5;
	height: auto;
}
#preview .postbody { width: 100%; margin: 0; }
.postprofile {
	width: 200px;
	float: right;
	padding: 20px 20px 0;
	font-size: 1.1em;
}
.postprofile:after, .postbody:after {
	clear: both;
	content: "";
	display: block;
}
.postprofile > dd { line-height: 1.75; }

.postbody > .content:nth-child(2) { margin-top: 20px; }

.postbody > p.rules {
	border-radius: 3px;
	margin-bottom: 20px;
	padding: 20px;
	text-align: center;
}

.postbody > .date {
	margin-bottom: 26px;
	font-size: 0.846em;
	line-height: 1;
}
.postbody > .date > a > i {
	font-size: 11px;
}
.postbody > h3 {
	margin: 0 0 9px;
	font-size: 1.385em;
	font-weight: 700;
	text-transform: none;
	line-height: 1;
	word-wrap: break-word;
}

.postbody > .signature {
    border-top-width: 1px;
    border-top-style: solid;
    margin-top: 20px;
    padding-top: 20px;
    width: 100%;
}

.attachbox {
	padding: 20px;
	border-radius: 3px;
}
.attach-image {
	overflow: auto;
	max-height: 300px;
	margin: 20px 0;
}

.post:hover > .back2top { opacity: 1; }
.post > .back2top {
	bottom: 0;
	position: absolute;
	right: -30px;
	text-align: center;
	width: 30px;
	height: 30px;
	line-height: 30px;
	overflow: hidden;
	border-radius: 0 3px 3px 0;
	opacity: 0;
	transition: opacity 0.15s ease;
}
.post > .back2top > a {
	height: 30px;
	line-height: 30px;
	width: 30px;
	display: block;
}

.post-icons {
	float: right;
	display: block;
	list-style: none;
	font-size: 0.846em;
}
.post-icons > li {
	float: left;
	margin-left: 20px;
}
.post-icons > li i {
	margin-right: 5px;
	font-size: 12px;
}

.profile-icons {
	border-top-width: 1px;
	border-top-style: solid;
	list-style: none;
	margin-top: 10px;
	padding-top: 10px;
}

.select-topic-icon label {
	border-width: 1px;
	border-style: solid;
	border-radius: 3px;
	display: inline-block;
	height: 35px;
	line-height: 35px;
	margin-left: 0;
	margin-right: 5px;
	padding: 0 5px;
	cursor: pointer;
	transition: background-color 0.15s ease;
}
.select-topic-icon input {
	margin-right: 5px;
	cursor: pointer;
}

#colour_palette tr { line-height: normal; vertical-align: top; }
#colour_palette td { display: inline; }
#smiley-box { width: 15%; float: right; padding-left: 10px; }
#message-box, #format-buttons { width: 85%; float: left; padding-right: 10px; }
textarea#message, textarea#signature {
	width: 100%;
	min-height: 300px;
	font-size: 1em;
	line-height: 1.5;
}

.select-topic-type label {
	display: inline-block;
	margin-right: 10px;
	cursor: pointer;
	margin-left: 0;
}
.select-topic-type input {
	margin-right: 5px;
	cursor: pointer;
}

#poll_option_text { height: 150px; }
.pollbar1 {
	border-radius: 15px;
	min-width: 35px;
	padding-left: 11px;
}
.pollbar2 {
	border-radius: 15px;
	padding: 0 10px;
}
.pollbar3 {
	border-radius: 15px;
	padding: 0 10px;
}
.pollbar4 {
	border-radius: 15px;
	padding: 0 10px;
}
.pollbar5 {
	border-radius: 15px;
	padding: 0 10px;
}

/* Topic review panel
----------------------------------------*/
#topicreview {
	height: auto;
	max-height: 500px;
	overflow: auto;
	padding: 0 20px;
	border-top-width: 20px;
	border-top-style: solid;
	border-bottom-width: 20px;
	border-bottom-style: solid;
	margin-bottom: 20px;
}
#topicreview .postbody {
	margin: 0;
	width: 100%;
}
#topicreview > .post:last-child { margin: 0; }

/* BB Code styles
----------------------------------------*/
.codebox {
	padding: 20px 20px 20px 45px;
	position: relative;
	border-radius: 3px;
	margin-left: 20px;
	margin-top: 20px;
}
.codebox:before {
	display: block;
	font-family: "FontAwesome";
	content: "\f121";
	position: absolute;
	top: 50%;
	left: -20px;
	margin-top: -20px;
	font-size: 14px;
	height: 45px;
	width: 45px;
	line-height: 45px;
	text-align: center;
	border-radius: 20px;
}
.codebox dt {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	display: block;
	font-style: normal;
	margin-bottom: 10px;
	padding-bottom: 10px;
	text-decoration: none;
}

blockquote {
	padding: 20px 20px 20px 45px;
	position: relative;
	border-radius: 3px;
	margin-left: 40px;
	margin-top: 20px;
}
blockquote:before {
	display: block;
	font-family: "FontAwesome";
	content: "\f10e";
	position: absolute;
	top: 50%;
	left: -20px;
	margin-top: -20px;
	font-size: 14px;
	height: 45px;
	width: 45px;
	line-height: 45px;
	text-align: center;
	border-radius: 20px;
}
blockquote cite {
	border-bottom-style: solid;
	border-bottom-width: 1px;
	display: block;
	font-style: normal;
	margin-bottom: 10px;
	padding-bottom: 10px;
	text-decoration: none;
}
/* Site Header First Type
---------------------------------------- */
#page-header-a {
	display: block;
	min-height: 100px;
	position: relative;
}
#page-header-a:after {
	clear: both;
	content: "";
	display: block;
}

#page-header-a #logo {
	position: relative;
	float: left;
	line-height: 100px;
}
#page-header-a #logo > a {
	display: block;
	margin: 0;
	position: relative;
	height: 100px;
}
#page-header-a #logo > a > img {
	vertical-align: middle;
}

#page-header-a #page-nav { float: left; }
#page-header-a #page-nav:after {
	clear: both;
	content: "";
	display: block;
}
#page-header-a #page-nav > ul {
	list-style: none;
	line-height: 100px;
	font-size: 1.3em;
	margin-left: 20px;
	float: left;
}
#page-header-a #page-nav > ul > li {
	height: 100%;
	float: left;
	position: relative;
}
#page-header-a #page-nav > ul > li > a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}

/* Drop Down */
#page-header-a #page-nav > ul > li:hover > ul { left: 0; opacity: 1; }
#page-header-a #page-nav > ul > li > ul {
	list-style: none;
	line-height: 40px;
	font-size: 1em;
	float: left;
	position: absolute;
	z-index: 999;
	min-width: 200px;
	top: 95px;
	width: auto;
	opacity: 0;
	left: -9999px;
	border-radius: 0 3px 3px 3px;
	transition: opacity 0.15s ease;
}
#page-header-a #page-nav > ul > li > ul:before {
	border-style: solid;
	border-width: 0 10px 10px 0;
	top: -10px;
	content: "";
	height: 0;
	left: 0;
	margin-bottom: 0;
	position: absolute;
	width: 0;
	z-index: 999;
}
#page-header-a #page-nav > ul > li > ul > li > a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	width: 100%;
	transition: background-color 0.15s ease;
}
#page-header-a #page-nav > ul > li > ul > li:first-child > a { border-radius: 0 3px 0 0; }
#page-header-a #page-nav > ul > li > ul > li:last-child > a { border-radius: 0 0 3px 3px; }
#page-header-a #page-nav > ul > li > ul > li:only-child > a { border-radius: 0 3px 3px 3px; }

.rmenu { display: none; }
#nav-menu { display: none; }










/* User Menu
---------------------------------------- */
#user-menu-a {
	min-height: 55px;
	font-size: 1.2em;
	margin-bottom: 40px;
}
#user-menu-a > ul {
	list-style: none;
	line-height: 45px;
	font-size: 1em;
	float: right;
	margin: 5px 5px 0 0;
}
#user-menu-a > ul > li {
	height: 45px;
	float: left;
}
#user-menu-a > ul > li > a {
	height: 45px;
	display: inline-block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}
#user-menu-a > ul > li > .w-icon { padding: 0 15px; }
#user-menu-a > ul > li > .w-icon > i {
	font-size: 14px;
	float: left;
	line-height: 45px;
}
#user-menu-a > ul > li > .w-icon > span { padding: 0 5px 0 20px; }
#user-menu-a > ul > li > .w-icon > span.hid {
	display: block;
	float: left;
	max-height: 0;
	max-width: 0;
	overflow: hidden;
	padding: 0;
	transition: 
		max-width 0.5s ease,
		max-height 0.5s ease,
		padding 0.5s ease;
}
#user-menu-a > ul > li:hover > .w-icon > span.hid {
	max-width: 500px;
	max-height: 45px;
	padding: 0 5px 0 20px;
}
#user-menu-a > ul > li > .w-icon-text > i { font-size: 12px; }
#user-menu-a > ul > li > .w-icon-text > span { padding: 0 0 0 7px; }










/* Main Search Box
--------------------------------------------- */
#user-menu-a #page-search {
	height: 45px;
	display: block;
	width: 300px;
	float: left;
	margin: 5px 0 0 5px;
}
#user-menu-a #page-search .keywords {
	height: 45px;
	display: block;
	font-size: 1em;
	width: 251px;
	float: left;
	padding: 0 20px 0 15px;
	transition: background-color 0.15s ease;
	-webkit-appearance: none;
	border-radius: 0;
}
#user-menu-a #page-search .button {
	height: 45px;
	display: block;
	font-size: 14px;
	padding: 0 15px;
	float: left;
	font-family: "FontAwesome";
	cursor: pointer;
	margin: 0;
	border-radius: 0;
	transition: background-color 0.15s ease;
	-webkit-appearance: none;
	border-radius: 0;
}










/* Site Header Second Type
---------------------------------------- */
#page-header-b {
	display: block;
	min-height: 150px;
	position: relative;
	text-align: center;
}
#page-header-b:after {
	clear: both;
	content: "";
	display: block;
}

#page-header-b #logo {
	position: relative;
	line-height: 100px;
}
#page-header-b #logo > a {
	display: block;
	margin: 0;
	position: relative;
	height: 100px;
}
#page-header-b #logo > a > img {
	vertical-align: middle;
}

#page-header-b #page-nav { text-align: center; }
#page-header-b #page-nav:after {
	clear: both;
	content: "";
	display: block;
}
#page-header-b #page-nav > ul {
	list-style: none;
	line-height: 50px;
	font-size: 1.3em;
	width: 100%;
	height: 50px;
	text-align: center;
}
#page-header-b #page-nav > ul > li {
	height: 100%;
	display: inline-block;
	position: relative;
}
#page-header-b #page-nav > ul > li > a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}

/* Drop Down */
#page-header-b #page-nav > ul > li:hover > ul { left: 0; opacity: 1; }
#page-header-b #page-nav > ul > li > ul {
	list-style: none;
	line-height: 40px;
	font-size: 1em;
	float: left;
	position: absolute;
	z-index: 999;
	min-width: 200px;
	top: 45px;
	width: auto;
	opacity: 0;
	left: -9999px;
	border-radius: 0 3px 3px 3px;
	transition: opacity 0.15s ease;
}
#page-header-b #page-nav > ul > li > ul:before {
	border-style: solid;
	border-width: 0 10px 10px 0;
	top: -10px;
	content: "";
	height: 0;
	left: 0;
	margin-bottom: 0;
	position: absolute;
	width: 0;
	z-index: 999;
}
#page-header-b #page-nav > ul > li > ul > li > a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	width: 100%;
	transition: background-color 0.15s ease;
}
#page-header-b #page-nav > ul > li > ul > li:first-child > a { border-radius: 0 3px 0 0; }
#page-header-b #page-nav > ul > li > ul > li:last-child > a { border-radius: 0 0 3px 3px; }
#page-header-b #page-nav > ul > li > ul > li:only-child > a { border-radius: 0 3px 3px 3px; }

.rmenu { display: none; }
#nav-menu { display: none; }










/* User Menu
---------------------------------------- */
#user-menu-b {
	min-height: 55px;
	font-size: 1.2em;
	margin-bottom: 40px;
}
#user-menu-b > ul {
	list-style: none;
	line-height: 45px;
	font-size: 1em;
	float: right;
	margin: 5px 5px 0 0;
}
#user-menu-b > ul > li {
	height: 45px;
	float: left;
}
#user-menu-b > ul > li > a {
	height: 45px;
	display: inline-block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}
#user-menu-b > ul > li > .w-icon { padding: 0 15px; }
#user-menu-b > ul > li > .w-icon > i {
	font-size: 14px;
	float: left;
	line-height: 45px;
}
#user-menu-b > ul > li > .w-icon > span { padding: 0 5px 0 20px; }
#user-menu-b > ul > li > .w-icon > span.hid {
	display: block;
	float: left;
	max-height: 0;
	max-width: 0;
	overflow: hidden;
	padding: 0;
	transition: 
		max-width 0.5s ease,
		max-height 0.5s ease,
		padding 0.5s ease;
}
#user-menu-b > ul > li:hover > .w-icon > span.hid {
	max-width: 500px;
	max-height: 45px;
	padding: 0 5px 0 20px;
}
#user-menu-b > ul > li > .w-icon-text > i { font-size: 14px; }
#user-menu-b > ul > li > .w-icon-text > span { padding: 0 0 0 7px; }










/* Main Search Box
--------------------------------------------- */
#user-menu-b #page-search {
	height: 45px;
	display: block;
	width: 300px;
	float: left;
	margin: 5px 0 0 5px;
}
#user-menu-b #page-search .keywords {
	height: 45px;
	display: block;
	font-size: 1em;
	width: 251px;
	float: left;
	padding: 0 20px 0 15px;
	transition: background-color 0.15s ease;
	-webkit-appearance: none;
	border-radius: 0;
}
#user-menu-b #page-search .button {
	height: 45px;
	display: block;
	font-size: 14px;
	padding: 0 15px;
	float: left;
	font-family: "FontAwesome";
	cursor: pointer;
	margin: 0;
	border-radius: 0;
	transition: background-color 0.15s ease;
	-webkit-appearance: none;
	border-radius: 0;
}










/* Site Header Third Type
---------------------------------------- */
#page-header-c {
	display: block;
	min-height: 100px;
	position: relative;
	margin-bottom: 40px;
}
#page-header-c:after {
	clear: both;
	content: "";
	display: block;
}

#page-header-c #logo {
	position: relative;
	float: left;
	line-height: 100px;
}
#page-header-c #logo > a {
	display: block;
	margin: 0;
	position: relative;
	height: 100px;
}
#page-header-c #logo > a > img {
	vertical-align: middle;
}

#page-header-c #page-nav { float: left; }
#page-header-c #page-nav:after {
	clear: both;
	content: "";
	display: block;
}
#page-header-c #page-nav > ul {
	list-style: none;
	line-height: 100px;
	font-size: 1.3em;
	margin-left: 20px;
	float: left;
}
#page-header-c #page-nav > ul > li {
	height: 100%;
	float: left;
	position: relative;
}
#page-header-c #page-nav > ul > li > a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}

/* Drop Down */
#page-header-c #page-nav > ul > li:hover > ul { left: 0; opacity: 1; }
#page-header-c #page-nav > ul > li > ul {
	list-style: none;
	line-height: 40px;
	font-size: 1em;
	float: left;
	position: absolute;
	z-index: 999;
	min-width: 200px;
	top: 95px;
	width: auto;
	opacity: 0;
	left: -9999px;
	border-radius: 0 3px 3px 3px;
	transition: opacity 0.15s ease;
}
#page-header-c #page-nav > ul > li > ul:before {
	border-style: solid;
	border-width: 0 10px 10px 0;
	top: -10px;
	content: "";
	height: 0;
	left: 0;
	margin-bottom: 0;
	position: absolute;
	width: 0;
	z-index: 999;
}
#page-header-c #page-nav > ul > li > ul > li > a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	width: 100%;
	transition: background-color 0.15s ease;
}
#page-header-c #page-nav > ul > li > ul > li:first-child > a { border-radius: 0 3px 0 0; }
#page-header-c #page-nav > ul > li > ul > li:last-child > a { border-radius: 0 0 3px 3px; }
#page-header-c #page-nav > ul > li > ul > li:only-child > a { border-radius: 0 3px 3px 3px; }

.rmenu { display: none; }
#nav-menu { display: none; }










/* User Menu
---------------------------------------- */
#user-menu-c {
	min-height: 55px;
	font-size: 1.2em;
}
#user-menu-c > .wrap > ul {
	list-style: none;
	line-height: 45px;
	font-size: 1em;
	float: right;
	margin: 5px 5px 0 0;
}
#user-menu-c > .wrap > ul > li {
	height: 45px;
	float: left;
}
#user-menu-c > .wrap > ul > li > a {
	height: 45px;
	display: inline-block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}
#user-menu-c > .wrap > ul > li > .w-icon { padding: 0 15px; }
#user-menu-c > .wrap > ul > li > .w-icon > i {
	font-size: 14px;
	float: left;
	line-height: 45px;
}
#user-menu-c > .wrap > ul > li > .w-icon > span { padding: 0 5px 0 20px; }
#user-menu-c > .wrap > ul > li > .w-icon > span.hid {
	display: block;
	float: left;
	max-height: 0;
	max-width: 0;
	overflow: hidden;
	padding: 0;
	transition: 
		max-width 0.5s ease,
		max-height 0.5s ease,
		padding 0.5s ease;
}
#user-menu-c > .wrap > ul > li:hover > .w-icon > span.hid {
	max-width: 500px;
	max-height: 45px;
	padding: 0 5px 0 20px;
}
#user-menu-c > .wrap > ul > li > .w-icon-text > i { font-size: 14px; }
#user-menu-c > .wrap > ul > li > .w-icon-text > span { padding: 0 0 0 7px; }










/* Main Search Box
--------------------------------------------- */
#user-menu-c #page-search {
	height: 45px;
	display: block;
	width: 300px;
	float: left;
	margin: 5px 0 0 0;
}
#user-menu-c #page-search .keywords {
	height: 45px;
	display: block;
	font-size: 1em;
	width: 251px;
	float: left;
	padding: 0 20px 0 20px;
	transition: background-color 0.15s ease;
	-webkit-appearance: none;
	border-radius: 0;
}
#user-menu-c #page-search .button {
	height: 45px;
	display: block;
	font-size: 14px;
	padding: 0 15px;
	float: left;
	font-family: "FontAwesome";
	cursor: pointer;
	margin: 0;
	border-radius: 0;
	transition: background-color 0.15s ease;
	-webkit-appearance: none;
	border-radius: 0;
}










/* Second Menu
--------------------------------------------- */
#second-menu {
	min-height: 40px;
	font-size: 1.1em;
	margin-bottom: 40px;
	margin-top: -40px;
}
#second-menu:after {
	clear: both;
	display: block;
	content: "";
}
#second-menu > .wrap > ul {
	list-style: none;
	line-height: 40px;
	font-size: 1em;
	float: left;
	width: 100%;
}
#second-menu > .wrap > ul > li {
	height: 100%;
	float: left;
}
#second-menu > .wrap > ul > .right { float: right; }
#second-menu > .wrap > ul > li > a {
	height: 100%;
	display: inline-block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}
#second-menu > .wrap > ul > li > .w-icon { padding: 0 10px; }
#second-menu > .wrap > ul > li > .w-icon > i { font-size: 14px; }
#second-menu > .wrap > ul > li > .w-icon > span { padding: 0 10px 0 20px; }
#second-menu > .wrap > ul > .legend:before {
	cursor: default;
	font-size: 14px;
	padding: 0 5px;
	content: "\f105";
	display: block;
	font-family: "FontAwesome";
	height: 100%;
	float: left;
}
/* Site Footer First Type
---------------------------------------- */
#page-footer-a {
	margin-top: 40px;
}

#page-footer-a h3 {
	font-weight: 300;
}

#page-footer-a #footer-menu {
	height: 60px;
	font-size: 1.1em;
}
#page-footer-a #footer-menu > ul {
	list-style: none;
	line-height: 60px;
	font-size: 1.091em;
	float: left;
	width: 100%;
}
#page-footer-a #footer-menu > ul > li {
	height: 100%;
	float: left;
	margin-right: 40px;
}
#page-footer-a #footer-menu > ul > .right { float: right; margin-left: 40px; margin-right: 0; }
#page-footer-a #footer-menu > ul > li > a {
	display: inline;
	transition: color 0.15s ease;
}
#page-footer-a #footer-menu > ul > li > .w-icon { padding: 0 10px; }
#page-footer-a #footer-menu > ul > li > .w-icon > i { font-size: 14px; }
#page-footer-a #footer-menu > ul > li > .w-icon > span { padding: 0 10px 0 0; }

#page-footer-a .hr-cfb {
	border-top-width: 1px;
	border-top-style: solid;
	display: block;
	content: "";
}

#page-footer-a #custom-footer { padding: 80px 0 60px; }
#page-footer-a #custom-footer p { font-size: 1.1em; }

#page-footer-a .footer-contact { list-style: none; font-size: 1.1em; }
#page-footer-a .footer-contact li {
	margin-bottom: 10px;
	line-height: 1.5;
	display: inline-block;
	transition: color 0.15s ease;
	clear: both;
	float: left;
}
#page-footer-a .footer-contact li i {
	min-width: 25px;
	margin-right: 5px;
	font-size: 14px;
	text-align: center;
	transition: color 0.15s ease;
}

#page-footer-a .footer-links { list-style: none; font-size: 1.1em; }
#page-footer-a .footer-links li {
	margin-bottom: 10px;
}
#page-footer-a .footer-links a {
	line-height: 1.5;
	text-align: center;
	transition: color 0.15s ease;
}

#page-footer-a .footer-social {
	list-style: none;
	margin-bottom: 20px;
	overflow: hidden;
}
#page-footer-a .footer-social li { float: left; }
#page-footer-a .footer-social a {
	height: 30px;
	width: 30px;
	line-height: 29px;
	text-align: center;
	border-radius: 15px;
	display: inline-block;
	margin-right: 5px;
	margin-bottom: 5px;
	transition:
		background-color 0.15s ease,
		color 0.15s ease;
}
#page-footer-a .footer-social i { font-size: 14px; }
#page-footer-a p + .footer-social { margin-top: -15px; }

#page-footer-a .copyright {
	width: 100%;
	text-align: center;
	padding: 20px 0;
}










/* Site Footer Second Type
---------------------------------------- */
#page-footer-b {
	margin-top: 40px;
	margin-bottom: 20px;
}

#page-footer-b h3 {
	font-weight: 300;
}

#page-footer-b #footer-menu {
	height: 60px;
	font-size: 1.1em;
	padding: 0 20px;
}
#page-footer-b #footer-menu > ul {
	list-style: none;
	line-height: 60px;
	font-size: 1em;
	float: left;
	width: 100%;
}
#page-footer-b #footer-menu > ul > li {
	height: 100%;
	float: left;
	margin-right: 40px;
}
#page-footer-b #footer-menu > ul > .right { float: right; margin-left: 40px; margin-right: 0; }
#page-footer-b #footer-menu > ul > li > a {
	display: inline;
	transition: color 0.15s ease;
}
#page-footer-b #footer-menu > ul > li > .w-icon { padding: 0 10px; }
#page-footer-b #footer-menu > ul > li > .w-icon > i { font-size: 14px; }
#page-footer-b #footer-menu > ul > li > .w-icon > span { padding: 0 10px 0 0; }

#page-footer-b #custom-footer { padding: 80px 0 60px; }
#page-footer-b #custom-footer p { font-size: 1.1em; }

#page-footer-b .copyright {
	width: 100%;
	text-align: center;
	padding: 20px;
}










/* Site Footer Third Type
---------------------------------------- */
#page-footer-c {
	margin-top: 40px;
}

#page-footer-c h3 {
	font-weight: 300;
}

#page-footer-c #footer-menu {
	height: 60px;
	font-size: 1.1em;
}
#page-footer-c #footer-menu > ul {
	list-style: none;
	line-height: 60px;
	font-size: 1.091em;
	float: left;
	width: 100%;
}
#page-footer-c #footer-menu > ul > li {
	height: 100%;
	float: left;
	margin-right: 40px;
}
#page-footer-c #footer-menu > ul > .right { float: right; margin-left: 40px; margin-right: 0; }
#page-footer-c #footer-menu > ul > li > a {
	display: inline;
	transition: color 0.15s ease;
}
#page-footer-c #footer-menu > ul > li > .w-icon { padding: 0 10px; }
#page-footer-c #footer-menu > ul > li > .w-icon > i { font-size: 14px; }
#page-footer-c #footer-menu > ul > li > .w-icon > span { padding: 0 10px 0 0; }

#page-footer-c .footer-social-overall {
	text-align: center;
	padding: 40px 0 0;
}
#page-footer-c .footer-social {
	list-style: none;
	overflow: hidden;
	text-align: center;
}
#page-footer-c .footer-social li { display: inline-block; }
#page-footer-c .footer-social a {
	text-align: center;
	display: inline-block;
	margin-right: 20px;
	margin-bottom: 20px;
}
#page-footer-c .footer-social a > * { transition: color 0.15s ease; }
#page-footer-c .footer-social i { font-size: 24px; line-height: 1; }

#page-footer-c .copyright {
	width: 100%;
	text-align: center;
	padding: 20px 0;
}
/* Control Panel Styles
---------------------------------------- */
/* Main CP box
---------------------------------------- */
#cp-menu {
	float: left;
	width: 20%;
	font-size: 1.2em;
	margin-bottom: 20px;
	padding-right: 10px;
}

#cp-main {
	float: left;
	width: 80%;
	margin-bottom: 20px;
	padding-left: 10px;
}

#cp-main > *:last-child, #cp-main > form > *:last-child {
	margin-bottom: 0;
}
#cp-main > .panel > .content > h3,
#cp-main > .panel > .content > form > h3 {
	font-size: 1.385em;
}

.cp-mini {
	margin-top: 20px;
	padding: 20px;
}
.cp-mini input {
	border-radius: 3px;
	cursor: pointer;
	float: right;
	height: 35px;
	padding: 0 10px;
	transition: background-color 0.15s ease 0s;
}
.mini { position: relative; }
.mini dt { line-height: 1.5; font-weight: 700; margin-bottom: 20px; }
.mini dd { line-height: 35px; margin-bottom: 5px; }
.mini dd:last-child { margin-bottom: 0; }

/* UCP navigation menu
----------------------------------------*/
#navigation > ul { list-style: none; width: 100%; }
#navigation > ul:nth-child(n+2) {
	border-top-width: 20px;
	border-top-style: solid;
}
#navigation > ul > li { width: 100%; }
#navigation > ul > li > a {
	width: 100%;
	line-height: 40px;
	min-height: 40px;
	display: block;
	padding: 0 20px;
	transition: background-color 0.15s ease;
}

/* Preferences panel layout
----------------------------------------*/
.cplist {
	list-style: none;
	font-size: 0.786em;
	line-height: 1.5;
	margin-bottom: 20px;
}
.cplist dl {
	min-height: 42px;
	background-repeat: no-repeat;
	background-position: 7px center;
}
.cplist dl:after {
    clear: both;
    content: "";
    display: block;
}
.cplist dt { font-size: 1.166em; line-height: 1.5; }
.cplist dt > .topictitle { font-size: 1.143em; line-height: 1; }
.cplist dt, .cplist dd { float: left; }
.cplist dt { width: 60%; }
.cplist dl.icon > dt { padding-left: 70px; padding-right: 20px; }
.cplist dt > i { font-size: 11px; margin-right: 7px; }
.cplist dfn { display: none; }
.cplist .posts { width: 10%; text-align: center; }
.cplist .lastpost i { font-size: 11px; }
.cplist .redirect { width: 15%; text-align: center; }
.cplist > li {
	min-height: 82px;
	padding: 20px;
}
.cplist > li:first-child { border-radius: 3px 3px 0 0; }
.cplist > li:last-child { border-radius: 0 0 3px 3px; }
.cplist > li:only-child { border-radius: 3px; }

.cplist .pagination {
	font-size: 0.786em;
	font-weight: 400;
}
.cplist .pagination > span {
	height: 20px;
	padding: 0;
}
.cplist .pagination > span > .page-dots,
.cplist .pagination > span > a {
	height: 20px;
	line-height: 20px;
	padding: 0 10px;
	display: block;
	float: left;
	transition: background-color 0.15s ease;
}

.cplist .lastpost, .cplist-header .lastpost { width: 20%; }
.cplist .option, .cplist-header .option { margin-right: 20px; }
.cplist .info, .cplist-header .info { width: 30%; }
.cplist .mark, .cplist-header .mark { width: 10%; text-align: center; }
.cplist .extra, .cplist-header .extra { width: 10%; text-align: center; }
.cplist .time, .cplist-header .time { width: 20%; text-align: center; }
.cplist .moderation, .cplist-header .moderation { width: 30%; }

.cplist-header + .cplist > li:first-child { border-radius: 0; }
.cplist-header + .cplist > li:only-child { border-radius: 0 0 3px 3px; }

.cplist-header {
	height: 40px;
	list-style: none;
	font-size: 0.786em;
	text-transform: uppercase;
	line-height: 40px;
	padding: 0 20px;
	border-radius: 3px 3px 0 0;
}
.cplist-header dt, .cplist-header dd { float: left; }
.cplist-header dt { width: 60%; }
.cplist-header .posts { width: 10%; text-align: center; }

#cp-main .table1 {
	box-shadow: none;
	border-collapse: separate;
	border-spacing: 0;
	border-radius: 3px;
	overflow: hidden;
}
#cp-main .table1 thead {
	font-size: 0.786em;
}
#cp-main .table1 tbody {
	font-size: 1em;
}

#cp-main .pagination { font-size: 0.846em; }
#cp-main .display-options { font-size: 1em; }
#cp-main #viewfolder > .display-options { font-size: 1.1em; }
#cp-main .search { font-size: 1em; }

.select-option {
	height: 35px;
	line-height: 35px;
	border-radius: 3px;
	padding: 0 0 0 20px;
	font-size: 1.1em;
	float: right;
	display: block;
	overflow: hidden;
}
.select-option label { margin-right: 20px; }
.select-option select {
	padding: 5.5px 5.5px 5.5px 20px;
	cursor: pointer;
	transition: background-color 0.15s ease;
	vertical-align: top;
}
.select-option input {
	cursor: pointer;
	height: 35px;
	padding: 0 10px;
	transition: background-color 0.15s ease;
	vertical-align: top;
}

textarea#warning { width: 100%; min-height: 200px; }
select#usernames { height: 85px; }

.delete {
	float: left;
	margin-right: 20px;
}
.delete input {
	font-family: "FontAwesome";
	line-height: normal;
	height: auto;
	cursor: pointer;
	margin-left: 5px;
	font-size: 14px;
	transition: color 0.15s ease;
}

#cp-main .postbody {
	margin: 0;
	width: 100%;
	font-size: 1em;
}

#cp-main .post .postbody {
	font-size: 1.3em;
	width: auto;
	margin-right: 200px;
}

#cp-main .content > .postbody {
	padding: 0;
	box-shadow: none;
}

/* Topicreview */
#cp-main .content #topicreview .postbody { font-size: 1em; margin: 0; }
#cp-main #topicreview .postbody { font-size: 1.3em; }

/* PM Styles
----------------------------------------*/
.pmlist > dd { margin-bottom: 20px; }
.pmlist > dd:last-child { margin-bottom: 0; }
.pmlist #username_list {
	height: 126px;
	width: 100%;
	font-size: 1em;
	line-height: 1.5;
}
#postingbox #group_list {
	height: 84px;
	width: 100%;
	font-size: 1em;
	line-height: 1.5;
}

/* PM marking colours */
.pm_marked_colour:before {
	display: block;
	content: "";
	width: 20px;
	height: 20px;
	border-radius: 10px;
	float: left;
	margin-right: 10px;
	margin-top: 5px;
	position: absolute;
}
.pm_replied_colour:before {
	display: block;
	content: "";
	width: 20px;
	height: 20px;
	border-radius: 10px;
	float: left;
	margin-right: 10px;
	margin-top: 5px;
	position: absolute;
}
.pm_friend_colour:before {
	display: block;
	content: "";
	width: 20px;
	height: 20px;
	border-radius: 10px;
	float: left;
	margin-right: 10px;
	margin-top: 5px;
	position: absolute;
}
.pm_foe_colour:before {
	display: block;
	content: "";
	width: 20px;
	height: 20px;
	border-radius: 10px;
	float: left;
	margin-right: 10px;
	margin-top: 5px;
	position: absolute;
}

.pm-legend:before { position: static; }
/* Responsive
---------------------------------------- */
@media (max-width: 1280px) {
	.wrap {
		width: 90%;
	}
	
	.panel > .back2top,
	.post > .back2top {
		right: 0;
		bottom: 0;
		border-radius: 3px 0 0 0;
	}
}

@media (max-width: 1080px) {
	.wrap {
		width: 95%;
	}
}

@media (max-width: 880px) {
	.wrap {
		width: 96%;
	}

	.column1 {
		width: 100%;
		float: none;
		padding-right: 0;
	}
	.column2 {
		width: 100%;
		float: none;
		padding-left: 0;
	}

	.c1,
	.c2,
	.c3,
	.c4,
	.c5,
	.c6,
	.c7,
	.c8,
	.c9 {
		padding: 0;
		width: 100%;
	}

	.c3-3 {
		padding: 0;
		width: 100%;
	}

	.c1-5,
	.c2-5,
	.c3-5,
	.c4-5,
	.c5-5,
	.c6-5,
	.c7-5,
	.c8-5 {
		padding: 0;
		width: 100%;
	}

	.postprofile {
		float: none;
		padding: 20px;
		width: 100%;
	}

	.postbody {
		float: none;
		margin-left: 0;
		width: 100%;
	}

	#cp-menu {
		float: none;
		width: 100%;
		font-size: 1.2em;
		margin-bottom: 20px;
		padding-right: 0;
	}

	#cp-main {
		float: none;
		width: 100%;
		margin-bottom: 20px;
		padding-left: 0;
	}

	#smiley-box {
		width: 100%;
		float: none;
		padding-left: 0;
	}
	#message-box, #format-buttons {
		width: 100%;
		float: none;
		padding-right: 0;
	}

	.post-icons > li i {
		margin-right: 0;
	}
	.post-icons > li span {
		display: none;
	}
}

@media (min-width: 681px) {
	#nav-menu {
		display: none !important;
	}
}

@media (max-width: 680px) {
	.wrap {
		width: 98%;
	}

	#logo {
		width: 80%;
		text-align: center;
	}

	#page-header-b {
		min-height: 100px;
	}
	#page-header-b #logo {
		float: left;
	}

	#page-nav {
		display: none;
	}

	#nav-menu {
		list-style: none;
		line-height: 50px;
		font-size: 1.4em;
		width: 100%;
		clear: both;
		display: none;
	}
	#nav-menu > li {
		height: 100%;
		width: 100%;
	}
	#nav-menu li > a {
		height: 100%;
		width: 100%;
		display: inline-block;
		padding: 0 20px;
		text-align: center;
		transition: background-color 0.15s ease;
	}

	/* Drop Down */
	#nav-menu li > ul {
		list-style: none;
		line-height: 50px;
		font-size: 1em;
		width: 100%;
		clear: both;
		position: relative;
	}
	#nav-menu li > ul:before {
		border-style: solid;
		border-width: 0 10px 10px 9px;
		top: -10px;
		content: "";
		height: 0;
		left: 50%;
		margin-left: -5px;
		margin-bottom: 0;
		position: absolute;
		width: 0;
		z-index: 999;
	}
	#nav-menu li > ul > li {
		height: 100%;
		width: 100%;
		position: relative;
	}
	#nav-menu li > ul > li:before {
		cursor: default;
		font-size: 14px;
		padding: 0 10px;
		content: "\f149";
		display: block;
		font-family: "FontAwesome";
		height: 100%;
		float: left;
		position: absolute;
	}
	#nav-menu li > ul > li > a {
		height: 100%;
		width: 100%;
		display: inline-block;
		padding: 0 20px;
		text-align: center;
		transition: background-color 0.15s ease;
	}

	.rmenu {
		font-size: 24px;
		display: block;
		height: 100px;
		width: 20%;
		text-align: center;
		min-height: 100px;
		line-height: 100px;
		float: right;
		cursor: pointer;
	}
	#user-menu-a,
	#user-menu-b,
	#user-menu-c {
		min-height: 80px !important;
	}
	#user-menu-a > ul,
	#user-menu-b > ul,
	#user-menu-c > .wrap > ul {
		display: none !important;
	}
	#page-search {
		height: 80px !important;
		width: 100% !important;
		margin: 0 !important;
	}
	#page-search .keywords {
		height: 80px !important;
		width: 80% !important;
	}
	#page-search .button {
		height: 80px !important;
		width: 20% !important;
		font-size: 24px !important;
	}

	#second-menu > .wrap > ul > li {
		width: 50%;
		float: left !important;
	}
	#second-menu > .wrap > ul > li > a {
		width: 100%;
		text-align: center;
	}
	#second-menu > .wrap > ul > .legend:before {
		position: absolute;
	}

	h2 {
		text-align: center;
	}

	.topics-posts, .posts-views {
		display: none;
		width: 45% !important;
	}
	.lastpost, .redirect {
		width: 45% !important;
	}

	dl.profile-details-avatar,
	dl.profile-details {
		width: 100%;
	}

	.rank-img {
		display: none;
	}
}

@media (max-width: 480px) {
	.wrap {
		width: 99%;
	}
	#second-menu > .wrap > ul > li {
		width: 100%;
	}
	#second-menu > .wrap > ul > .legend:before {
		content: "\f107";
		line-height: normal;
		text-align: center;
		width: 100%;
		height: auto;
		position: static;
	}

	.lastpost {
		display: none;
	}

	.forabg-content dt,
	.forumbg-content dt {
		width: 100%;
	}
}
body {
	background-color: #EAECF0;
	color: #323A45;
}

h2 {
	color: #323A45;
}

h2 > a,
h2 > a:link,
h2 > a:visited	{
	color: #323A45;
}

h2 > a:hover	{
	color: #1861AD;
}

h2 > a:active,
h2 > a:focus	{
	color: #0A121D;
}

h3 > a,
h3 > a:link,
h3 > a:visited	{
	color: #323A45;
}

h3 > a:hover	{
	color: #1861AD;
}

h3 > a:active,
h3 > a:focus	{
	color: #0A121D;
}

hr {
	border-color: #EAECF0;
}

hr.dashed {
	border-color: #CCCCCC;
}

select {
	background-color: #EAECF0;
}

option {
	background-color: #EAECF0;
	color: #323A45;
}

*::-webkit-input-placeholder {
	color: #EAECF0;
}

*:-moz-placeholder {
	color: #EAECF0;
}

*::-moz-placeholder {
	color: #EAECF0;
}

*:-ms-input-placeholder {
	color: #EAECF0;
}

#jumpbox {
	background-color: #D3D5D9;
	color: #323A45;
}

#jumpbox select {
	background-color: #DDDFE3;
}

#jumpbox select:hover,
#jumpbox select:focus {
	background-color: #D3D5D9;
}

#jumpbox input {
	background-color: #DDDFE3;
}

#jumpbox input:hover,
#jumpbox input:focus {
	background-color: #D3D5D9;
}

#register_lang {
	background-color: #D3D5D9;
	color: #323A45;
}

#register_lang select {
	background-color: #DDDFE3;
}

#register_lang select:hover,
#register_lang select:focus {
	background-color: #D3D5D9;
}

.forum-selection, .forum-selection2 {
	background-color: #D3D5D9;
	color: #323A45;
}

.forum-selection select,
.forum-selection2 select {
	background-color: #DDDFE3;
}

.forum-selection select:hover,
.forum-selection select:focus,
.forum-selection2 select:hover,
.forum-selection2 select:focus {
	background-color: #D3D5D9;
}

.forum-selection input,
.forum-selection2 input {
	background-color: #DDDFE3;
}

.forum-selection input:hover,
.forum-selection input:focus,
.forum-selection2 input:hover,
.forum-selection2 input:focus {
	background-color: #D3D5D9;
}

.quickmod {
	background-color: #D3D5D9;
	color: #323A45;
}

.quickmod select {
	background-color: #DDDFE3;
}

.quickmod select:hover,
.quickmod select:focus {
	background-color: #D3D5D9;
}

.quickmod input {
	background-color: #DDDFE3;
}

.quickmod input:hover,
.quickmod input:focus {
	background-color: #D3D5D9;
}

.display-options {
	color: #323A45;
}

.display-options select {
	background-color: #DDDFE3;
	color: #323A45;
}

.display-options select:hover,
.display-options select:focus {
	background-color: #D3D5D9;
}

.display-options input {
	background-color: #DDDFE3;
	color: #323A45;
}

.display-options input:hover {
	background-color: #D3D5D9;
}

.display-actions {
	color: #323A45;
}

.display-actions input {
	background-color: #DDDFE3;
	color: #323A45;
}

.display-actions input:hover {
	background-color: #D3D5D9;
}

.display-actions select {
	background-color: #DDDFE3;
}

.display-actions .mark-unmark a {
	background-color: #DDDFE3;
	color: #323A45;
}

.display-actions .mark-unmark a:hover {
	background-color: #D3D5D9;
}

dl.details > dt > span {
	color: #969EA9;
}

fieldset dt > span {
	color: #969EA9;
}

fieldset .inputbox {
	background-color: #EAECF0;
}

fieldset .inputbox:hover,
fieldset .inputbox:focus {
	background-color: #DDDFE3;
}

select + input[type="submit"],
label + input[type="submit"],
input + input[type="submit"] {
    background-color: #DDDFE3;
    color: #323A45;
}

select + input[type="submit"]:hover,
label + input[type="submit"]:hover,
input + input[type="submit"]:hover {
	background-color: #D3D5D9;
}

fieldset select {
	background-color: #EAECF0;
}

fieldset select:hover,
fieldset select:focus {
	background-color: #DDDFE3;
}

.fields1 .inputbox {
	background-color: #EAECF0;
}

.fields1 .inputbox:hover,
.fields1 .inputbox:focus {
	background-color: #DDDFE3;
}

a:link {
	color: #1861AD;
}

a:visited {
	color: #1861AD;
}

a:hover {
	color: #646C77;
}

a:active {
	color: #0A121D;
}

a:focus {
	color: #0A121D;
}

[data-tooltip]:after {
	color: #EAECF0;
	background-color: #357ECA;
	box-shadow: 0 1px 0 #2C333D;
}

[data-tooltip]:before {
	border-color: #2C333D transparent transparent transparent;
}

#tabs {
	background-color: #DDDFE3;
}

#tabs > ul > li > a:link,
#tabs > ul > li > a:visited {
	color: #323A45;
}

#tabs > ul > li > a:hover {
	color: #1861AD;
}

#tabs > ul > li > a:active {
	color: #0A121D;
}

#tabs > ul > li > a:after {
	border-color: #DDDFE3 transparent transparent transparent;
}

.table1 {
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.table1 thead {
	background-color: #357ECA;
	color: #EAECF0;
}

.table1 thead th a,
.table1 thead th a:link,
.table1 thead th a:visited {
	color: #EAECF0 !important;
}

.table1 thead th a:hover {
	color: #CCCED2 !important;
}

.table1 thead th a:active,
.table1 thead th a:focus {
	color: #FFFFFF !important;
}

.table1 tbody {
	background-color: #FAFAFA;
}

.table1 tbody tr:nth-child(odd) {
	background-color: #FFFFFF;
}

.info tbody th {
	color: #000000;
}

.secondary-block {
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.secondary-block-header {
	background-color: #323A45;
	color: #EAECF0;
}

.secondary-block-header a,
.secondary-block-header a:link,
.secondary-block-header a:visited {
	color: #EAECF0 !important;
}

.secondary-block-header a:hover {
	color: #CCCED2 !important;
}

.secondary-block-header a:active,
.secondary-block-header a:focus {
	color: #FFFFFF !important;
}

.secondary-block-content {
	background-color: #FAFAFA;
	color: #323A45;
}

.mono-block {
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.mono-block-header {
	background-color: #323A45;
	color: #EAECF0;
}

.mono-block-header a {
	color: #EAECF0 !important;
}

.mono-block-content {
	background-color: #FAFAFA;
	color: #323A45;
}

.info-block {
	background-color: #F2DEDE;
}

#board-disabled {
	background-color: #DDDFE3;
	color: #CC181E;
}

.error {
	color: #CC181E;
}

.pagination {
	background-color: #DDDFE3;
}

.pagination > .total,
.pagination > .matches {
	background-color: #D3D5D9;
}

.pagination > .count > a,
.pagination > .count > strong,
.pagination > .count > .page-dots {
	color: #323A45;
}

.pagination > .count > strong {
	background-color: #D3D5D9;
}

.pagination > .count > a:hover {
	background-color: #D3D5D9;
}

.pagination > span, .pagination > a {
	color: #323A45;
}

.pagination > a:hover {
	background-color: #D3D5D9;
}

.forumbg-content .pagination > span > .page-dots,
.forumbg-content .pagination > span > a {
	color: #323A45;
}

.forumbg-content .pagination > span > a:hover {
	background-color: #D3D5D9;
}

.btn-locked > a {
	background-color: #DDDFE3;
	color: #828A95;
}

.btn-post > a {
	background-color: #357ECA;
	border-bottom-color: #1861AD;
	color: #EAECF0;
}

.btn-post:hover > a {
	background-color: #1861AD;
}

.btn-post:active > a {
	background-color: #323A45;
	border-bottom-color: #323A45;
}

.btn-reply > a {
	background-color: #357ECA;
	border-bottom-color: #1861AD;
	color: #EAECF0;
}

.btn-reply:hover > a {
	background-color: #1861AD;
}

.btn-reply:active > a {
	background-color: #323A45;
	border-bottom-color: #323A45;
}

.btn-normal > a, .btn-normal > input {
	background-color: #357ECA;
	color: #EAECF0;
}

.btn-normal > a:hover, .btn-normal > input:hover {
	background-color: #1861AD;
}

.btn-normal > a:active, .btn-normal > input:active {
	background-color: #323A45;
}

.btn-big > a, .btn-big > input {
	background-color: #357ECA;
	color: #EAECF0;
}

.btn-big > a:hover, .btn-big > input:hover {
	background-color: #1861AD;
}

.btn-big > a:active, .btn-big > input:active {
	background-color: #323A45;
}

.btn-s-big > a, .btn-s-big > input {
	background-color: #357ECA;
	color: #EAECF0;
}

.btn-s-big > a:hover,
.btn-s-big > input:hover {
	background-color: #1861AD;
}

.btn-s-big > a:active,
.btn-s-big > input:active {
	background-color: #323A45;
}

#format-buttons > div {
	background-color: #323A45;
}

#format-buttons > div > input {
	color: #EAECF0;
	background-color: transparent;
}

#format-buttons > div > select {
	background-color: transparent;
	color: #EAECF0;
}

#format-buttons > div > input:hover,
#format-buttons > div > select:hover {
	background-color: #357ECA;
}

.forabg {
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.forabg-header {
	background-color: #357ECA;
	color: #EAECF0;
}

.forabg-header a,
.forabg-header a:link,
.forabg-header a:visited {
	color: #EAECF0 !important;
}

.forabg-header a:hover {
	color: #CCCED2 !important;
}

.forabg-header a:active,
.forabg-header a:focus {
	color: #FFFFFF !important;
}

.forabg-content {
	background-color: #FAFAFA;
}

.forabg-content dt > .forumtitle:link,
.forabg-content dt > .forumtitle:visited {
	color: #323A45;
}

.forabg-content dt > .forumtitle:hover {
	color: #357ECA;
}

.forabg-content > li:nth-child(even) {
	background-color: #FFFFFF;
}

.forumbg {
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.forumbg-header {
	background-color: #357ECA;
	color: #EAECF0;
}

.forumbg-header a,
.forumbg-header a:link,
.forumbg-header a:visited {
	color: #EAECF0 !important;
}

.forumbg-header a:hover {
	color: #CCCED2 !important;
}

.forumbg-header a:active,
.forumbg-header a:focus {
	color: #FFFFFF !important;
}

.forumbg-content {
	background-color: #FAFAFA;
}

.forumbg-content dt > .topictitle:link,
.forumbg-content dt > .topictitle:visited {
	color: #323A45;
}

.forumbg-content dt > .topictitle:hover {
	color: #357ECA;
}

.forumbg-content > li:nth-child(even) {
	background-color: #FFFFFF;
}

.new-post i {
	color: #CC181E;
}

.unapproved-link {
	background-color: #323A45;
}

.reported-link {
	background-color: #CC181E;
}

.unapproved-link,
.reported-link {
	color: #EAECF0 !important;
}

.actions > ul {
	background-color: #DDDFE3;
}

.actions > ul > li > a {
	color: #323A45;
}

.actions > ul > li > a:hover {
	background-color: #D3D5D9;
}

.search {
	background-color: #DDDFE3;
}

.search .keywords::-webkit-input-placeholder {
	color: #323A45;
}

.search .keywords:-moz-placeholder {
	color: #323A45;
}

.search .keywords::-moz-placeholder {
	color: #323A45;
}

.search .keywords:-ms-input-placeholder {
	color: #323A45;
}

.search .keywords {
	background-color: transparent;
	color: #323A45;
}

.search .button {
	background-color: transparent;
	color: #323A45;
}

.search .button:hover {
	background-color: #C9CBCF;
}

.search .keywords:hover,
.search .keywords:focus,
.search .keywords:hover + .button,
.search .keywords:focus + .button {
	background-color: #C9CBCF;
}

#search_forum:hover,
#search_forum:focus {
	background-color: #EAECF0;
}

#search_forum option:hover {
	background-color: #DDDFE3;
}

.panel > .content {
	background-color: #FAFAFA;
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.panel > .content > h2 {
	color: #1861AD;
}

.panel > .back2top {
	background-color: #D3D5D9;
}

.back2top > a,
.back2top > a:link,
.back2top > a:visited {
	color: #323A45;
}

.faq {
	border-bottom-color: #D6D8DC;
}

.jump2post > a,
.jump2post > a:link,
.jump2post > a:visited {
	background-color: #DDDFE3;
	color: #323A45;
}

.post:hover > .jump2post > a {
	background-color: #357ECA;
	color: #EAECF0;
}

.post {
	background-color: #DDDFE3;
}

.postbody {
	background-color: #FAFAFA;
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.postbody > p.rules {
	background-color: #F2DEDE;
	color: #EAECF0 !important;
}

.postbody > .date {
	color:  #969EA9;
}

.postbody > .date > a > i {
	color:  #969EA9;
}

.postbody > .signature {
    border-top-color: #DDDFE3;
}

.attachbox {
	background-color: #EAECF0;
}

.post > .back2top {
	background-color: #D3D5D9;
}

.post-icons > li > a,
.post-icons > li > a:link,
.post-icons > li > a:visited {
	color: #323A45;
}

.post-icons > li > a:hover {
	color: #1861AD;
}

.post-icons > li > a:active {
	color: #0A121D;
}

.profile-icons {
	border-top-color: #D0D2D6;
}

.profile-icons a,
.profile-icons a:link,
.profile-icons a:visited {
	color: #323A45;
}

.profile-icons a:hover {
	color: #1861AD;
}

.profile-icons a:active {
	color: #0A121D;
}

.select-topic-icon label {
	border-color: #EAECF0;
	background-color: transparent;
}

.select-topic-icon label:hover,
.select-topic-icon label:focus {
	background-color: #EAECF0;
}

.pollbar1 {
	background-color: #2C333D;
	color: #EAECF0;
}

.pollbar2 {
	background-color: #323A45;
	color: #EAECF0;
}

.pollbar3 {
	background-color: #1861AD;
	color: #EAECF0;
}

.pollbar4 {
	background-color: #357ECA;
	color: #EAECF0;
}

.pollbar5 {
	background-color: #357ECA;
	color: #EAECF0;
}

#topicreview {
	background-color: #DDDFE3;
	border-top-color: #DDDFE3;
	border-bottom-color: #DDDFE3;
}

.codebox {
	background-color: #EAECF0;
}

.codebox:before {
	background-color: #EAECF0;
	box-shadow: 2px 0 0 #DDDFE3;
}

.codebox dt {
	border-bottom-color: #DDDFE3;
}

.syntaxbg {
	color: #FFFFFF;
}

.syntaxcomment {
	color: #FF8000;
}

.syntaxdefault {
	color: #DD0000;
}

.syntaxhtml {
	color: #323A45;
}

.syntaxkeyword {
	color: #007700;
}

.syntaxstring {
	color: #0000BB;
}

blockquote {
	background-color: #EAECF0;
}

blockquote:before {
	background-color: #EAECF0;
	box-shadow: 2px 0 0 #DDDFE3;
}

blockquote cite {
	border-bottom-color: #DDDFE3;
}

blockquote blockquote,
blockquote blockquote blockquote blockquote,
blockquote blockquote blockquote blockquote blockquote blockquote {
	background-color: #DDDFE3;
}

blockquote blockquote cite,
blockquote blockquote blockquote blockquote cite,
blockquote blockquote blockquote blockquote blockquote blockquote cite {
	border-bottom-color: #D0D2D6;
}

blockquote blockquote:before,
blockquote blockquote blockquote blockquote:before,
blockquote blockquote blockquote blockquote blockquote blockquote:before {
	background-color: #DDDFE3;
	box-shadow: 2px 0 0 #D0D2D6;
}

blockquote blockquote blockquote,
blockquote blockquote blockquote blockquote blockquote,
blockquote blockquote blockquote blockquote blockquote blockquote blockquote {
	background-color: #EAECF0;
}

blockquote blockquote blockquote cite,
blockquote blockquote blockquote blockquote blockquote cite,
blockquote blockquote blockquote blockquote blockquote blockquote blockquote cite {
	border-bottom-color: #DDDFE3;
}

blockquote blockquote blockquote:before,
blockquote blockquote blockquote blockquote blockquote:before,
blockquote blockquote blockquote blockquote blockquote blockquote blockquote:before {
	background-color: #EAECF0;
	box-shadow: 2px 0 0 #DDDFE3;
}

blockquote blockquote .codebox,
blockquote blockquote blockquote blockquote .codebox,
blockquote blockquote blockquote blockquote blockquote blockquote .codebox {
	background-color: #EAECF0;
}

blockquote blockquote .codebox dt,
blockquote blockquote blockquote blockquote .codebox dt,
blockquote blockquote blockquote blockquote blockquote blockquote .codebox dt {
	border-bottom-color: #DDDFE3;
}

blockquote .codebox,
blockquote blockquote blockquote .codebox,
blockquote blockquote blockquote blockquote blockquote .codebox,
blockquote blockquote blockquote blockquote blockquote blockquote blockquote .codebox {
	background-color:  #DDDFE3;
}

blockquote .codebox dt,
blockquote blockquote blockquote .codebox dt,
blockquote blockquote blockquote blockquote blockquote .codebox dt,
blockquote blockquote blockquote blockquote blockquote blockquote blockquote .codebox dt {
	border-bottom-color: #D0D2D6;
}

blockquote blockquote .codebox:before,
blockquote blockquote blockquote blockquote .codebox:before,
blockquote blockquote blockquote blockquote blockquote blockquote .codebox:before {
	background-color: #EAECF0;
	box-shadow: 2px 0 0 #DDDFE3;
}

blockquote .codebox:before,
blockquote blockquote blockquote .codebox:before,
blockquote blockquote blockquote blockquote blockquote .codebox:before,
blockquote blockquote blockquote blockquote blockquote blockquote blockquote .codebox:before {
	background-color: #DDDFE3;
	box-shadow: 2px 0 0 #D0D2D6;
}

.cp-mini {
	background-color: #FAFAFA;
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

.cp-mini input {
	background-color: #DDDFE3;
	color: #323A45;
}

.cp-mini input:hover {
	background-color: #D3D5D9;
}

#navigation {
	background-color: #DDDFE3;
}

#navigation > ul:nth-child(n+2) {
	border-top-color: #EAECF0;
}

#navigation > ul > li#active-subsection > a {
	background-color: #D5D7DB;
}

#navigation > ul > li > a {
	color: #323A45;
}

#navigation > ul > li > a:hover {
	background-color: #D5D7DB;
}

.cplist > li {
	background-color: #EAECF0;
}

.cplist .pagination > span > .page-dots,
.cplist .pagination > span > a {
	color: #323A45;
}

.cplist .pagination > span > a:hover {
	background-color: #D3D5D9;
}

.cplist-header {
	background-color: #D5D7DB;
	color: #323A45;
}

.cplist-header a {
	color: #323A45;
}

#cp-main .table1 thead {
	background-color: transparent;
	color: #323A45;
}

#cp-main .table1 thead td,
#cp-main .table1 thead th {
	background-color: #D5D7DB;
}

#cp-main .table1 tbody {
	background-color: transparent;
}

#cp-main .table1 tbody tr {
	background-color: transparent;
}

#cp-main .table1 tbody td,
#cp-main .table1 tbody th {
	background-color: #EAECF0;
}

.select-option {
	background-color: #D3D5D9;
	color: #323A45;
}

.select-option select {
	background-color: #DDDFE3;
}

.select-option select:hover,
.select-option select:focus {
	background-color: #D3D5D9;
}

.select-option input {
	background-color: #DDDFE3;
	color: #323A45;
}

.select-option input:hover {
	background-color: #D3D5D9;
}

.delete input {
	background-color: transparent;
	color: #323A45;
}

.delete input:hover,
.delete input:focus {
	color: #CC181E;
}

.pm_marked_colour:before {
	background-color: #323A45;
}

.pm_replied_colour:before {
	background-color: #357ECA;
}

.pm_friend_colour:before {
	background-color: #52AA39;
}

.pm_foe_colour:before {
	background-color: #CC181E;
}





/* Custom Footers and Headers */
#page-footer-a {
	background-color: #323A45;
	color: #EAECF0;
}

#page-footer-a h3 {
	color: #357ECA;
}

#page-footer-a #footer-menu > ul > li {
	color: #EAECF0;
}

#page-footer-a #footer-menu > ul > li > a {
	color: #EAECF0;
}

#page-footer-a #footer-menu > ul > li > a:hover {
	color: #CCCED2;
}

#page-footer-a #footer-menu > ul > li > a:active {
	color: #FFFFFF;
}

#page-footer-a .hr-cfb {
	border-top-color: #161E29;
}

#page-footer-a #custom-footer {
	color: #848C97;
}

#page-footer-a .footer-contact li {
	color: #848C97;
}

#page-footer-a .footer-contact li i {
	color: #848C97;
}

#page-footer-a .footer-contact li:hover {
	color: #EAECF0;
}

#page-footer-a .footer-contact li:hover i {
	color: #357ECA;
}

#page-footer-a .footer-links a {
	color: #848C97;
}

#page-footer-a .footer-links a:hover {
	color: #EAECF0;
}

#page-footer-a .footer-social a {
	background-color: #161E29;
	color: #848C97;
}

#page-footer-a .footer-social a:hover {
	background-color: #323A45;
	color: #EAECF0;
}

#page-footer-a .copyright {
	background-color: #161E29;
}

#page-footer-b {
	background-color: #323A45;
	color: #EAECF0;
}

#page-footer-b h3 {
	color: #357ECA;
}

#page-footer-b #footer-menu > ul > li {
	color: #EAECF0;
}

#page-footer-b #footer-menu > ul > li > a {
	color: #EAECF0;
}

#page-footer-b #footer-menu > ul > li > a:hover {
	color: #CCCED2;
}

#page-footer-b #footer-menu > ul > li > a:active {
	color: #FFFFFF;
}

#page-footer-b #custom-footer {
	color: #848C97;
}

#page-footer-b .copyright {
	background-color: #161E29;
}

#page-footer-c {
	background-color: #323A45;
	color: #EAECF0;
}

#page-footer-c h3 {
	color: #357ECA;
}

#page-footer-c #footer-menu > ul > li {
	color: #EAECF0;
}

#page-footer-c #footer-menu > ul > li > a {
	color: #EAECF0;
}

#page-footer-c #footer-menu > ul > li > a:hover {
	color: #CCCED2;
}

#page-footer-c #footer-menu > ul > li > a:active {
	color: #FFFFFF;
}

#page-footer-c .footer-social-overall {
	background-color: #161E29;
}

#page-footer-c .footer-social a {
	color: #848C97;
}

#page-footer-c .footer-social a > * {
	color: #848C97;
}

#page-footer-c .footer-social a:hover {
	color: #EAECF0;
}

#page-footer-c .footer-social a:hover .fa-pinterest {
	color: #CB2027;
}

#page-footer-c .footer-social a:hover .fa-tumblr {
	color: #3E5A70;
}

#page-footer-c .footer-social a:hover .fa-twitter {
	color: #55ACEE;
}

#page-footer-c .footer-social a:hover .fa-vimeo-square {
	color: #FFFFFF;
}

#page-footer-c .footer-social a:hover .fa-dribbble {
	color: #E04C86;
}

#page-footer-c .footer-social a:hover .fa-facebook {
	color: #3B5A9B;
}

#page-footer-c .footer-social a:hover .fa-flickr {
	color: #0062DD;
}

#page-footer-c .footer-social a:hover .fa-google-plus {
	color: #D95232;
}

#page-footer-c .footer-social a:hover .fa-linkedin {
	color: #007BB6;
}

#page-footer-c .footer-social a:hover .fa-rss {
	color: #FE6902;
}

#page-footer-c .copyright {
	background-color: #161E29;
}





#page-header-a #page-nav > ul > li > a {
	color: #323A45;
}

#page-header-a #page-nav > ul > li > a:hover {
	background-color: #DDDFE3;
}

#page-header-a #page-nav > ul > li > ul {
	background-color: #357ECA;
	box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
}

#page-header-a #page-nav > ul > li > ul:before {
	border-color: transparent transparent #323A45;
}

#page-header-a #page-nav > ul > li > ul > li > a {
	color: #EAECF0;
}

#page-header-a #page-nav > ul > li > ul > li > a:hover {
	background-color: #1861AD;
}

#user-menu-a {
	background-color: #323A45;
}

#user-menu-a > ul > li {
	color: #EAECF0;
}

#user-menu-a > ul > li > a {
	color: #EAECF0;
}

#user-menu-a > ul > li > a:hover {
	background-color: #357ECA;
}

#user-menu-a #page-search .keywords {
	background-color: #161E29;
	color: #EAECF0;
}

#user-menu-a #page-search .button {
	background-color: #161E29;
	color: #EAECF0;
}

#user-menu-a #page-search .button:hover {
	background-color: #357ECA;
}

#user-menu-a #page-search .keywords:hover,
#user-menu-a #page-search .keywords:focus,
#user-menu-a #page-search .keywords:hover + .button,
#user-menu-a #page-search .keywords:focus + .button {
	background-color: #357ECA;
}

#page-header-b #page-nav > ul > li > a {
	color: #323A45;
}
#page-header-b #page-nav > ul > li > a:hover {
	background-color: #DDDFE3;
}

#page-header-b #page-nav > ul > li > ul {
	background-color: #357ECA;
	box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
}

#page-header-b #page-nav > ul > li > ul:before {
	border-color: transparent transparent #323A45;
}

#page-header-b #page-nav > ul > li > ul > li > a {
	color: #EAECF0;
}

#page-header-b #page-nav > ul > li > ul > li > a:hover { background-color: #1861AD; }

#user-menu-b {
	background-color: #323A45;
}

#user-menu-b > ul > li {
	color: #EAECF0;
}

#user-menu-b > ul > li > a {
	color: #EAECF0;
}

#user-menu-b > ul > li > a:hover { background-color: #357ECA; }

#user-menu-b #page-search .keywords {
	background-color: #161E29;
	color: #EAECF0;
}

#user-menu-b #page-search .button {
	background-color: #161E29;
	color: #EAECF0;
}

#user-menu-b #page-search .button:hover {
	background-color: #357ECA;
}

#user-menu-b #page-search .keywords:hover,
#user-menu-b #page-search .keywords:focus,
#user-menu-b #page-search .keywords:hover + .button,
#user-menu-b #page-search .keywords:focus + .button {
	background-color: #357ECA;
}

#page-header-c {
	background-color: #FAFAFA;
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.05);
}

#page-header-c + main #second-menu {
	background-color: #DDDFE3;
}

#page-header-c #page-nav > ul > li > a {
	color: #323A45;
}

#page-header-c #page-nav > ul > li > a:hover {
	background-color: #DDDFE3;
}

#page-header-c #page-nav > ul > li > ul {
	background-color: #357ECA;
	box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
}

#page-header-c #page-nav > ul > li > ul:before {
	border-color: transparent transparent #323A45;
}

#page-header-c #page-nav > ul > li > ul > li > a {
	color: #EAECF0;
}

#page-header-c #page-nav > ul > li > ul > li > a:hover {
	background-color: #1861AD;
}

#user-menu-c {
	background-color: #323A45;
}

#user-menu-c > .wrap > ul > li {
	color: #EAECF0;
}

#user-menu-c > .wrap > ul > li > a {
	color: #EAECF0;
}

#user-menu-c > .wrap > ul > li > a:hover {
	background-color: #357ECA;
}

#user-menu-c #page-search .keywords {
	background-color: #161E29;
	color: #EAECF0;
}

#user-menu-c #page-search .button {
	background-color: #161E29;
	color: #EAECF0;
}

#user-menu-c #page-search .button:hover {
	background-color: #357ECA;
}

#user-menu-c #page-search .keywords:hover,
#user-menu-c #page-search .keywords:focus,
#user-menu-c #page-search .keywords:hover + .button,
#user-menu-c #page-search .keywords:focus + .button {
	background-color: #357ECA;
}

#second-menu > .wrap > ul {
	background-color: #DDDFE3;
}

#second-menu > .wrap > ul > li {
	color: #323A45;
}

#second-menu > .wrap > ul > li > a {
	color: #323A45;
}

#second-menu > .wrap > ul > li > a:hover {
	background-color: #D5D7DB;
}

#second-menu > .wrap > ul > li > .active {
	background-color: #D5D7DB;
}

#second-menu > .wrap > ul > .legend:before {
	color: #323A45;
}

/* RTL Colours */
.rtl #page-header-a #page-nav > ul > li > ul:before {
	border-color: transparent transparent #323A45;
}

.rtl #page-header-b #page-nav > ul > li > ul:before {
	border-color: transparent transparent #323A45;
}

.rtl #page-header-c #page-nav > ul > li > ul:before {
	border-color: transparent transparent #323A45;
}

.rtl [data-tooltip]:before {
	border-color: #2C333D transparent transparent transparent;
}

.rtl blockquote:after {
	background-color: #EAECF0;
	box-shadow: -2px 0 0 #DDDFE3;
}

.rtl .codebox:after {
	background-color: #EAECF0;
	box-shadow: -2px 0 0 #DDDFE3;
}

.rtl blockquote blockquote,
.rtl blockquote blockquote blockquote blockquote,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote {
	background-color: #DDDFE3;
}

.rtl blockquote blockquote cite,
.rtl blockquote blockquote blockquote blockquote cite,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote cite {
	border-bottom-color: #D0D2D6;
}

.rtl blockquote blockquote:after,
.rtl blockquote blockquote blockquote blockquote:after,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote:after {
	background-color: #DDDFE3;
	box-shadow: -2px 0 0 #D0D2D6;
}

.rtl blockquote blockquote blockquote,
.rtl blockquote blockquote blockquote blockquote blockquote,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote blockquote {
	background-color: #EAECF0;
}

.rtl blockquote blockquote blockquote cite,
.rtl blockquote blockquote blockquote blockquote blockquote cite,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote blockquote cite {
	border-bottom-color: #DDDFE3;
}

.rtl blockquote blockquote blockquote:after,
.rtl blockquote blockquote blockquote blockquote blockquote:after,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote blockquote:after {
	background-color: #EAECF0;
	box-shadow: -2px 0 0 #DDDFE3;
}

.rtl blockquote blockquote .codebox,
.rtl blockquote blockquote blockquote blockquote .codebox,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote .codebox {
	background-color: #EAECF0;
}

.rtl blockquote blockquote .codebox dt,
.rtl blockquote blockquote blockquote blockquote .codebox dt,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote .codebox dt {
	border-bottom-color: #DDDFE3;
}

.rtl blockquote .codebox,
.rtl blockquote blockquote blockquote .codebox,
.rtl blockquote blockquote blockquote blockquote blockquote .codebox,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote blockquote .codebox {
	background-color:  #DDDFE3;
}

.rtl blockquote .codebox dt,
.rtl blockquote blockquote blockquote .codebox dt,
.rtl blockquote blockquote blockquote blockquote blockquote .codebox dt,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote blockquote .codebox dt {
	border-bottom-color: #D0D2D6;
}

.rtl blockquote blockquote .codebox:after,
.rtl blockquote blockquote blockquote blockquote .codebox:after,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote .codebox:after {
	background-color: #EAECF0;
	box-shadow: -2px 0 0 #DDDFE3;
}

.rtl blockquote .codebox:after,
.rtl blockquote blockquote blockquote .codebox:after,
.rtl blockquote blockquote blockquote blockquote blockquote .codebox:after,
.rtl blockquote blockquote blockquote blockquote blockquote blockquote blockquote .codebox:after {
	background-color: #DDDFE3;
	box-shadow: -2px 0 0 #D0D2D6;
}

.rtl .pm_marked_colour:after {
	background-color: #323A45;
}

.rtl .pm_replied_colour:after {
	background-color: #357ECA;
}

.rtl .pm_friend_colour:after {
	background-color: #52AA39;
}

.rtl .pm_foe_colour:after {
	background-color: #CC181E;
}

/* Responsive Colours */
@media (max-width: 680px) {
	#nav-menu {
		background-color: #DDDFE3;
	}

	#nav-menu li > a {
		color: #323A45;
	}

	#nav-menu li > a:hover {
		background-color: #D3D5D9;
	}

	#nav-menu li > ul {
		background-color: #D3D5D9;
	}
	#nav-menu li > ul:before {
		border-color: transparent transparent #D3D5D9;
	}

	#nav-menu li > ul > li:before {
		color: #323A45;
	}

	#nav-menu li > ul > li > a {
		color: #323A45;
	}

	#nav-menu li > ul > li > a:hover {
		background-color: #C9CBCF;
	}

	.rmenu {
		background-color: #357ECA;
	}
}
";s:10:"theme_path";s:10:"ariki_blue";s:10:"theme_name";s:10:"Ariki Blue";s:11:"theme_mtime";s:10:"1426079498";s:11:"imageset_id";s:1:"3";s:13:"imageset_name";s:10:"Ariki Blue";s:18:"imageset_copyright";s:20:"&copy; Gramziu, 2014";s:13:"imageset_path";s:10:"ariki_blue";s:13:"template_path";s:10:"ariki_blue";}}