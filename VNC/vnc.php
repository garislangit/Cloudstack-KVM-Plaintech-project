<!-- Copyright (C) 2010, 2011, 2012 GlavSoft LLC. -->
<!-- All rights reserved. -->
<!--  -->
<!-- ------------------------------------------------------------------------- -->
<!-- This file is part of the TightVNC software.  Please visit our Web site: -->
<!--  -->
<!-- http://www.tightvnc.com/ -->
<!--  -->
<!-- This program is free software; you can redistribute it and/or modify -->
<!-- it under the terms of the GNU General Public License as published by -->
<!-- the Free Software Foundation; either version 2 of the License, or -->
<!-- (at your option) any later version. -->
<!--  -->
<!-- This program is distributed in the hope that it will be useful, -->
<!-- but WITHOUT ANY WARRANTY; without even the implied warranty of -->
<!-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the -->
<!-- GNU General Public License for more details. -->
<!--  -->
<!-- You should have received a copy of the GNU General Public License along -->
<!-- with this program; if not, write to the Free Software Foundation, Inc., -->
<!-- 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA. -->
<!-- ------------------------------------------------------------------------- -->
<!--  -->



<html>
<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
<?php

session_start();
$port = $_SESSION['port'];

echo $port;
?>
	
	<body>
		<section id="ManagementMenu"> 
		<applet archive="tightvnc-jviewer.jar"
			code="com.glavsoft.viewer.Viewer"
			width="1" height="1">
			<param name="Host" value="24.132.150.212" /> <!-- Host to connect. Default:  the host from which the applet was loaded. -->
			<param name="Port" value="<?php echo $port; ?>" /> <!-- Port number to connect. Default: 5900 -->
			<!--param name="Password" value="" /--> <!-- Password to the server (not recommended to use this parameter here) -->
			<param name="OpenNewWindow" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="ShowControls" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="ViewOnly" value="no" /> <!-- yes/true or no/false. Default: no/false -->
			<param name="AllowClipboardTransfer" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
            <param name="RemoteCharset" value="standard" /> <!-- Charset encoding is used on remote system. Use this option to specify character encoding will be used for encoding clipboard text content to. Default value (when parameter is empty): local system default character encoding. Set the value to 'standard' for using 'Latin-1' charset which is only specified by rfb standard for clipboard transfers. -->

			<param name="ShareDesktop" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="AllowCopyRect" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="Encoding" value="Tight" /> <!-- Possible values: "Tight", "Hextile", "ZRLE", and "Raw". Default: Tight -->
			<param name="CompressionLevel" value="" /> <!-- 1-9 or empty. Empty means server default -->
			<param name="JpegImageQuality" value="" /> <!-- 1-9, Lossless or empty. When param is set to "Lossless" no jpeg compression used. Empty means server default -->
			<param name="LocalPointer" value="On" /> <!-- Possible values: on/yes/true (draw pointer locally), off/no/false (let server draw pointer), hide). Default: "On"-->
			<param name="ConvertToASCII" value="no" /> <!-- Whether to convert keyboard input to ASCII ignoring locale. Possible values: yes/true, no/false). Default: "No"-->

			<param name="colorDepth" value="" /> <!-- Reserved for future. Possible values: 6, 8, 16, 24, 32 (equals to 24). Only 24/32 is supported now -->
			<param name="ScalingFactor" value="100" /> <!-- Scale local representation of the remote desktop on startup. Default is 100 means 100% -->

            <!-- SSH tunneling options -->
            <param name="sshHost" value="" /><!-- SSH host name. -->
            <param name="sshUser" value="" /><!-- SSH port number. When empty, standard SSH port number (22) is used -->
            <param name="sshPort" value="" /><!-- SSH user name. -->

        </applet>
		<br />
		
	</body>
</html>