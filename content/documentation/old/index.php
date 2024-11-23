<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	#*****************************************************************************
	#
	# template.php
	#
	# Author: 		Freddy Allilaire
	# Date:			2005-12-05
	#
	# Description: Type your page comments here - these are not sent to the browser
	#
	#
	#****************************************************************************
	
	#
	# Begin: page-specific settings.  Change these. 
	$pageTitle 		= "Documentation";
	$pageKeywords	= "";
	$pageAuthor		= "Freddy Allilaire";
	
	# Paste your HTML content between the EOHTML markers!	
	$html = <<<EOHTML

<!-- Main part -->
	<div id="midcolumn">
		<h1>$pageTitle</h1>

		<h3>ATL</h3>
		<p>
          <ul class="midlist">
          	<li>
      		  <a href="http://wiki.eclipse.org/ATL/Concepts">ATL Concepts wiki page</a>:
		      An introduction to ATL concepts.
		    </li>
		    <li>
      		  <a href="http://wiki.eclipse.org/ATL/Tutorials">ATL Tutorials</a>:
		      Tutorials on how to use ATL.
		    </li>
          	<li>
      		  <a href="http://wiki.eclipse.org/ATL/User_Guide">ATL User Guide</a>:
		      The complete ATL User Guide.
		    </li>
			<li>
      		  <a href="http://wiki.eclipse.org/ATL/Developer_Guide">ATL Developer Guide</a>:
		      A description of ATL implementation for developers.
		    </li>
			<li>
      		  <a href="ATL_VMSpecification[v00.01].pdf">Specification of the ATL Virtual Machine</a>:
		      Working draft of the specification of the ATL Virtual Machine.
		    </li>
			<li>
      		  <a href="ATL_Transformation_Template[v00.01].pdf">ATL Transformation Description Template</a>:
		      Working draft of the transformation description template.
		    </li>
			<li>
      		  <a href="ATL_VM_Presentation_[1.0].pdf">Presentation of the ATL Virtual Machine</a>:
		      	An introduction to the ATL Virtual Machine (V1.0 draft)
		    </li>
		  </ul>
		</p>
      	<hr class="clearer" />
      	
      	<h3>ATL Example Presentation</h3>
		<p>
          <ul class="midlist">
		    <li>
      		  Families to Persons (<a href="ATLUseCase_Families2Persons.pdf">PDF version</a>, <a href="ATLUseCase_Families2Persons.ppt">Powerpoint version</a>):
	      		  This presentation describes a very simple model transformation example, some kind of ATL "hello world".
		    </li>
		  </ul>
		</p>
      	<hr class="clearer" />
      	
		<h3>Old Documentations</h3>
		<p>
          <ul class="midlist">
			<li>
			  <a href="ATL_PresentationSheet.pdf">ATL presentation sheet</a>: Short presentation of ATL project.
			</li>
			<li>
				<a href="ATL_Starter_Guide.pdf">ATL Starter's Guide</a>: Working draft of the ATL Starter's Guide. 
			</li>
		    <li>
		      <a href="ATL_User_Manual[v0.7].pdf">ATL User Manual</a>: The ATL User Manual.
		    <li>
      		  <a href="ATL_Inventory.pdf">ATL Inventory</a>:
		      This document gives a glimpse of the "ATL world" and all the resources available.
		    </li>
		    <li>
      		  <a href="ATL_Poster.pdf">ATL Poster</a>
		    </li>
		    <li>
      		  ATL Flyer: <a href="ATL_Flyer_Normal_Version.pdf">Normal version</a>, <a href="ATL_Flyer_Booklet_Version.pdf">Booklet version</a>
		    </li>
			<li>
      		  <a href="ANT_Task_AMMA.pdf">ANT Task for AMMA/ATL</a>:
		      	A presentation of the AMMA/ATL Ant tasks (a wiki page is also available: <a href="http://wiki.eclipse.org/index.php/AM3_Ant_Tasks">http://wiki.eclipse.org/index.php/AM3_Ant_Tasks</a>)
		    </li>
		    <li>
      		  <a href="ATL_Installation_Guide[v0.1].pdf">ATL installation guide</a>:
      			This document aims to provide a step-by-step guide for installing the Eclipse/EMF distribution of the
				ATL Development Tools.
			</li>
			<li>
      		  <a href="http://wiki.eclipse.org/index.php/ATL/How_Install_ATL_From_CVS/">Installation of ADT from source</a>:
      			This document explains how to install ADT (IDE for ATL) from source.
      		</li>
		  </ul>
		</p>
      	<hr class="clearer" />

	</div>
	
EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
