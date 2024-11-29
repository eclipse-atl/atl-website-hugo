---
title: "A Metamodel Independent Approach to Difference Representation"
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

# A Metamodel Independent Approach to Difference Representation

> **By Antonio Cicchetti, Davide Di Ruscio and Alfonso Pierantonio (Università dell'Aquila)** \
> April 2007

This document presents an ATL implementation of a metamodel independent approach to the representation of model differences which is agnostic of the calculation method. Given two models being differenced which conform to a metamodel, their difference is conforming to another metamodel derived from the former by an automated transformation. Interestingly, difference models are firstclass artifacts which in turn induce other transformations, such that they can be applied to one of the differenced models to automatically obtain the other one.

## Keywords

Metamodeling, Model Difference, Model Versioning and Evolution, High-order tranformations.

## Overview

### Difference Metamodel


Given two models being differenced and that conform to a given metamodel MM, their difference conforms to another metamodel MMD that can be automatically derived from MM. In particular, the new metamodel has to provide with the constructs able to express the modifications that have to be performed on the initial version of a given model in order to obtain the final one. The approach permits the representation of changes that can grouped as follows:

  1. additions: new elements are added in the final model;
  2. deletions: some of the existing elements in the initial model are deleted as a whole;
  3. changes: a new version of the model can consist of some updates of already existing elements;

{{< figure src="img/generalPicture.png" caption="Figure 1: General Picture" width="50%" >}}

For instance, the metaclasses AddedClass, DeletedClass and ChangedClass in Figure 3 are derived by the metaclass Class depicted in the simplified UML metamodel depicted in Figure 2. The resulting metamodel allows the representation of the differences among two distinct versions of a UML model.

{{< figure src="img/umlMetamodel.png" caption="Figure 2: Sample UML Metamodel" width="50%" >}}

Changes of already existing elements are represented through Changed elements as the class updates which are given by means of ChangedClass instances each of them associated with a corresponding updatedElement class. The latter specifies how ChangedClass has to be modified in the new model version in terms of attributes and associations. The Changed modification is kind of shortcut which groups simple modifications consisting of Added and Deleted only reducing the size of the overall difference model. The features which are not represented in the ChangedClass instance will remain unchanged and will be simply copied in the new version of the given element. Finally, the features specified both in the ChangedClass instance and in the associated updatedElement will be modified according to descriptions given in the last one.

{{< figure src="img/extendedUmlMetamodel.png" caption="Figure 3: Sample Generated UML Difference Metamodel" width="50%" >}}

According to the general picture in Figure 1, a model transformation MM2MMD is defined in order to produce the difference metamodel MMD associated with MM and a fragment is reported in the following fragment:

{{< figure src="img/mm2mmd.jpg" caption="Figure 4: Fragment of the MM2MMD transformation" width="60%" >}}

### Difference Animation


A difference model can be executed to "reconstruct" a final model starting from the initial one. Unfortunately, this is intrinsically difficult and it requires a high-order transformation. In particular, according to the lower side of Figure 5, the model transformation (*MMD\_MM2MM*) can be applied to a model M1 in order to obtain a target M2 with respect to the differences specified in a model MD. Such a model conforms to the metamodel MMD automatically obtained from MM as previously discussed.

{{< figure src="img/differenceAnimation.png" caption="Figure 5: Difference Animation" width="35%" >}}

The *MMD\_MM2MM* transformation implements the rules to apply on a source model M1 the additions, deletions and changes specified in the model MD. More precisely, considering the dashed part in Figure 1, for each metaclass MC in the metamodel MM, the transformation *MMD\_MM2MM* contains the following rules:

  1. *AddedMC2MC*: it manages the elements in the difference model MD that conform to the AddedMC metaclass. For each element, the rule creates in M2 a new instance of MC setting the corresponding structural features according to the specification of the AddedMC element;
  2. *ChangedMC2MC*: it updates already existing elements in the initial model of type MC according to the modifications specified in MD through ChangedMC instances;
  3. *UnchangedMC2MC*: it copies the unmodified instances of the metaclass MC which have to be the same both in M1 and M2. The source pattern of this rule has a guard matching only the MC elements which have not been changed nor deleted.

Concerning the management of DeletedMC instances, no rules are provided, since the guard in the source pattern of the UnchangedMC2MCrule guarantees that elements which have been specified as deleted in the difference model are not matched during the transformation phase (hence, not copied in the target model M2).

An ATL implementation of this high-order transformation has been defined and it consists of three main rules (see Figure 6) that are AddedClass (lines 4-25), UnchangedClass (lines 27-49), and ChangedClass (lines 51-70). They are dedicated to the generation of the three kinds of rules needed for the management of each metaclass specified in the source difference model. Depending on the structural features of the matched metaclass, a number of helpers are created. Since such generations are quite complex and it is difficult to specify them in a declarative way, ATL called rules and action blocks are used. For instance, the lines 21-24 in Figure 6 implements an action blocks where the called rule CreateAddedHelper is invoked in order to generate the target helpers needed for the management of additions specified in a given model difference (see the lower side of Figure 5)

{{< figure src="img/MMD2ATL.jpg" caption="Figure 6: Fragment of the MMD2ATL high-order transformation" width="40%" >}}

This work is a first attempt to support model versioning and evolution in a MDE setting. Further work will address the problem of conflict detection and resolution. When software is developed in a distributed environment, parallel modifications can give place to conflicts which are usually detected by means of traditional lexical approaches which lack of abstraction and can give place to false positive and negative issues.

## Related Use Cases

{{< grid/div class="col-md-6" >}}
### [AMW Use Case](https://www.eclipse.org/gmt/amw/usecases/compare/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Metamodel comparison and model migration
{{</ grid/div >}}

&nbsp;

&nbsp;

## References

  1. A.Cicchetti, D.Di Ruscio, A. Pierantonio. A Metamodel Independent Approach to Difference Representation, Dipartimento di Informatica, Università degli Studi dell'Aquila, TRCS 005/2007, 2007

## Download

No longer available.

## Acknowledgement

The present work is being supported by the IST European MODELPLEX project (MODELing solution for comPLEX software systems, FP6-IP 34081).
