---
title: "Compiling a new formal verification language to LOTOS (ISO 8807)"
#headline: "The Community for Open Innovation and Collaboration"
#tagline: "The Eclipse Foundation provides our global community of individuals and organizations with a mature, scalable, and business-friendly environment for open source software collaboration and innovation."
hide_page_title: true
hide_sidebar: true
#hide_breadcrumb: true
#show_featured_story: true
layout: "single"
#links: [[href: "/projects/", text: "Projects"],[href: "/org/workinggroups/", text: "Working Group"],[href: "/membership/", text: "Members"],[href: "/org/value", text: "Business Value"]]
#container: "container-fluid"
---

# Compiling a new formal verification language to LOTOS (ISO 8807)

> **By Frédéric Jouault (INRIA ATLAS), and [Frédéric Lang](https://www.inrialpes.fr/vasy/people/Frederic.Lang/) (INRIA [VASY](https://www.inrialpes.fr/vasy/))** \
> September 2007

In this use case, we translate [FIACRE](https://www-sop.inria.fr/oasis/fiacre/) programs into [LOTOS](https://www.inrialpes.fr/vasy/cadp/) ([ISO 8807](https://www.iso.org/iso/iso_catalogue/catalogue_tc/catalogue_detail.htm?csnumber=16258)) programs. This work is the result of the cooperation of two INRIA teams: ATLAS (Nantes), and [VASY](https://www.inrialpes.fr/vasy/) (Grenoble), in the context of the [OpenEmbeDD](https://openembedd.inria.fr/) project.

## Keywords

[LOTOS](https://www.inrialpes.fr/vasy/cadp/), [ISO 8807](https://www.iso.org/iso/iso_catalogue/catalogue_tc/catalogue_detail.htm?csnumber=16258), [FIACRE](https://www-sop.inria.fr/oasis/fiacre/), [formal verification](https://en.wikipedia.org/wiki/Formal_verification), [model-checking](https://en.wikipedia.org/wiki/Model-checking).

## Overview

[FIACRE](https://www-sop.inria.fr/oasis/fiacre/) (french acronym of: Format Intermédiaire pour les Architectures de Composants Répartis Embarqués, meaning: Intermediate Format for the Architectures of Embedded Distributed Components) is a new intermediate language for the formal description and verification of asynchronous concurrent systems. In this work, we define a compiler from FIACRE to [LOTOS](https://www.inrialpes.fr/vasy/cadp/) (Language Of Temporal Ordering Specification, [ISO 8807](https://www.iso.org/iso/iso_catalogue/catalogue_tc/catalogue_detail.htm?csnumber=16258)) using Model Engineering techniques. The output of this compiler can then be verified using the [CADP](https://www.inrialpes.fr/vasy/cadp/) toolbox. The abstract syntax of each language is defined in [KM3](https://wiki.eclipse.org/KM3), and the concrete syntax in [TCS](https://wiki.eclipse.org/TCS). The translation from FIACRE to LOTOS is defined as an ATL model-to-model transformation.

The current version is able to translate FIACRE types (e.g., enumerations, intervals, arrays), which definitions are relatively concise, into equivalent LOTOS types, which definitions are typically more verbose. For instance, the sample FIACRE program given in Figure 1 is automatically transformed into the LOTOS program given in Figure 2. Note that both programs are presented as screenshots of TGE (Textual Generic Editor), the TCS-based editor. This shows that once the concrete syntax of a language has been defined in TCS, TGE can be used to automatically provide a language-specific editor.

{{< figure src="FIACRE-Simple_enum.png" caption="Figure 1. Simple FIACRE enumeration as seen in TGE" >}}

{{< figure src="LOTOS-Simple_enum.png" caption="Figure 2. LOTOS type generated from the simple FIACRE enumeration (click picture for larger version)" >}}

Although only types are transformed at the current time, the definitions (abstract and concrete syntaxes) of FIACRE and LOTOS cover larger parts of the languages. For instance, Figure 3 shows how TGE can edit one of the LOTOS examples.

{{< figure src="LOTOS-TGE.png" caption="Figure 3. The bitalt.lotos LOTOS example edited in TGE (click picture for larger version)" >}}

We also created a web service to use this transformation scenario, so that it can be tested and used without having to install Eclipse. You can see below a sample output of this web service invoked on the same sample FIACRE program as used in Figure 1.

### Compilaton of a simple FIACRE enumeration into a LOTOS type with the FIACRE2LOTOS web service

#### Source: FIACRE Model

	type test is
	    enum a, b, c end

#### Target: LOTOS Model

	(* ---------------------------------------------------------------------------- *)
	(* Author: FIACRE2LOTOS.atl                                                     *)
	(* Automatically generated code                                                 *)
	(* ---------------------------------------------------------------------------- *)
	specification unnamed : noexit

	    type test is Boolean
	        sorts
	        test
	        opns
	            a (*! constructor *)
	            , b (*! constructor *)
	            , c (*! constructor *)
	            : -> test
	            _eq_, _neq_ : test, test -> Bool
	        eqns
	            forall x, y : test

	            ofsort Bool
	                x = y => x eq y = true;
	                x eq y = false;
	                x neq y = not(x eq y);
	    endtype
	behaviour



	endspec

## Related Use Cases

None at the current time.

## Download

No longer available.

## Acknowledgement

The present work is being supported by the [OpenEmbeDD project](https://openembedd.inria.fr/home_html-en?set_language=en&cl=en). We would like to thank Marc Pantel (Toulouse) from the TopCased project, and Christian Attiogbé from the COLOSS team (Nantes) for their advice.
