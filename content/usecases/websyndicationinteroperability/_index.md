---
title: "Web Syndication Interoperability (RSS and Atom)"
#headline: "The Community for Open Innovation and Collaboration"
#tagline: "The Eclipse Foundation provides our global community of individuals and organizations with a mature, scalable, and business-friendly environment for open source software collaboration and innovation."
hide_page_title: true
hide_sidebar: true
#hide_breadcrumb: true
#show_featured_story: true
#layout: "single"
#links: [[href: "/projects/", text: "Projects"],[href: "/org/workinggroups/", text: "Working Group"],[href: "/membership/", text: "Members"],[href: "/org/value", text: "Business Value"]]
#container: "container-fluid"
---

# Web Syndication Interoperability (RSS and Atom)

> **By Freddy Allilaire (INRIA)** \
> February 2007

This use case shows how to translate between Atom and RSS formats. All transformations code in ATL and metamodels code in KM3 is available from the [zoos](https://www.eclipse.org/gmt/am3/zoos/).

## Keywords

[Web Feed Format](https://en.wikipedia.org/wiki/Web_feed), [Syndication](https://en.wikipedia.org/wiki/Wikipedia:Syndication), Interoperability, [RSS](https://en.wikipedia.org/wiki/RSS_(file_format)), [Atom](https://en.wikipedia.org/wiki/Atom_%28standard%29), XML.

## Overview

{{< figure src="img/Feed-icon.svg.png" alt="Feed icon" class="float-right" >}}

A web feed is a data format used for serving users frequently updated content. Content distributors syndicate a web feed, thereby allowing users to subscribe to it. Making a collection of web feeds accessible in one spot is known as aggregation. Web feeds are operated by many news web sites, weblogs, schools, and podcasters. Web feeds allow software programs to check for updates published on a web site. People who generate web syndication feeds have a choice of formats. Today, the two most likely candidates are RSS 2.0 and Atom 1.0. The main motivation for the development of Atom was dissatisfaction with RSS. Each of the various web syndication feed formats has attracted large groups of supporters who remain satisfied by the specification and capabilities of their respective formats.

The goal of this case study is to provide a bridge between the most popular web feed formats. This bridge proposes a light and flexible interoperability solution. The overall approach is summarized in the following figure:

{{< figure src="img/UseCaseOverview.png" caption="\"Web Syndication Interoperability (RSS and Atom)\" Use Case's Overview" >}}

The XML injection and extraction phase was done by using XML projector available from the AM3 and ATL toolkit. The Model-to-Model transformation phase was implemented by using ATL model-to-model transformations. Metamodels was created by using KM3 syntax and toolkit. All the metamodels mentioned in the previous schema (and so used within this use case) are available at the [Download section](#download).

We provide below a set of screenshots showing the different input/output files provided/created with this use case:

{{< figure src="img/Sample.png" caption="Screenshots of the input/outputs of the use case" >}}

## Related Use Cases

None at the current time.

##  Download

{{< grid/div class="col-md-6" >}}
### [Complete scenario](../../atltransformations/#rss-to-atom)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Scenario available in the ATL transformation zoo (with source files).
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [RSS-2.0 Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#RSS-2.0)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
RSS-2.0 metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Atom Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#ATOM)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Atom metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [XML Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#XML)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
XML metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.
