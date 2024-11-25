---
title: "Modeling Web applications - Detailed description"
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

# Modeling Web applications - Detailed description

This document explains how model annotation has been applied in this Use Case. It gives a description of the models implied and the context in which they are developed. For a more detailed explanation on this as well as on how to execute the [example provided](../resources/SOD-M.zip), see the [User Guide](../resources/User.Guide.pdf).

## Application Context

Service-Oriented Computing [1] is a new paradigm for application development whose main proposal is the use of services as fundamental elements. Services usually range from quite simple ones, like buying a book or renting a car to more complex ones involving complex processes such as obtaining sales ratings or participating in public auctions.

Nevertheless, although the design and implementation of web services can be apparently easy, the implementation of business processes using web services is not so effortless. Languages for the implementation of business processes have many limitations when they are used in the early stages of the development process [2]. This occurs mainly because the transformation from high-level business models to a composition language that implements those business processes with web services is not a trivial issue.

Attending to these facts we have defined a model driven method for service-oriented web applications development (SOD-M [3]). It starts from a high level business model and allows obtaining a service composition model that simplify the mapping to a specific web service technology. This way, the method defines new Platform Independent Models (PIMs) and the mappings between them. The process is summarized in the figure below. In this Use Case we focus in the mapping from the Extended Use Case Model to the Service Process Model.

{{< figure src="../images/SOD-M.Behavioral.Modeling.png" caption="Behavioral Modeling process in SOD-M" >}}

##  The Models

To illustrate this work we use the models from a conference management system we have developed. The Extended Use Case model is a Use Case model representing the different services offered by a Web Information System, as well as the functionalities required to carry out each service. In our example, the conference management system offers three different services: Submit an Article, Show the submitted articles and Edit the data of an author. In order to provide with this complex services, some basic services are needed, as the Log-In or the Register ones. To model the relation between the different Use Cases two types of associations are used: <<include>> and <<extend>>. The former implies that the behaviour of the included Use Case is inserted in the including Use Case, while the later specifies how and when the behaviour defined in the extending use case can be inserted into the behaviour defined in the extended use case.

On the other hand, in the Service Process model each complex service identified in the previous model is mapped to an activity and the basic services that it uses are represented as service activities. This way, back to the example we have three different activities that use a set of service activities. For instance the Log-In one is used by the three activities.

{{< figure src="../images/WebConference.Models.png" caption="Use Case Overview" >}}

##  Model Annotation

To generate a Service Process model, it is needed some information not included in the Extended Use Case model. For instance, if a Use Case includes two or more Use Cases, the order in which they should be executed in the including Use Case should be specified, since the mapping rule for *<<include>>* relationships gives the two options shown in the picture below.

{{< figure src="../images/Include.Mapping.Rule.png" caption="Include Relationships Mapping Rule" >}}

To handle this information, that can be interpreted as parameters to execute the transformation, we use a weaving model that conforms to a new extension of the [core weaving metamodel](https://www.eclipse.org/gmt/amw/zoo/#AMW%20core). It is based on the annotation extension metamodel. The next figure show an excerpt of the extension that can be found on the [example file](../resources/SOD-M.zip).

{{< figure src="../images/Annotation.Extension.png" caption="Excerpt of the annotation weaving metamodel" >}}

Thus, a weaving model conforming to this metamodel includes two different types of WLinks (in fact, of annotations): **ActivityComposition** and **IncludeOrder**. The former serves to identify which of the Use Cases from the Extened Use Case model correspond to a Service provided by the sytem, as well as the entry and exit points to carry out the service. The later helps to solve the problem about the mapping of several include relationships attached to the same Use Case. In the example we define the annotation model shown in the figure below.

{{< figure src="../images/Annotating.Model.png" caption="Annotating of the the Extended Use Case model" >}}

## Using model annotation in model transformations

The annotation of the source model allows to add the missing data we need to execute the transformation. In order to use this information, we just have to code some ATL helpers. For instance, to map every *include* object we have to know if it is related with other *include* objects (remember the ambiguity about the mapping of include relationships). Thus, we define a helper that navigates the weaving model (the annotation model) looking for **IncludeOrder** annotations referring to the given *include* object. The helper checks if there is an annotation whose *former* element is the one that was being mapped when it was invoked.

{{< figure src="../images/ATL.Excerpt.Include.Helper.png" >}}

Then we define two different rules for mapping include objects and we include a guard in one of them to distinguish which one should be used in each specific case. The guard invokes the helper we have just shown.

{{< figure src="../images/ATL.Excerpt.Simple.Include.Rule.png" >}}

## References

  1. Papazoglou, M.P., Georgakopoulos, D.: Serviced-Oriented Computing. Communications of ACM Vol. 46, N. 10 (2003) 25-28.
  2. Verner, L.: BPM: The Promise and the Challenge. Queue of ACM Vol. 2, N. 4 (2004) 82-91.
  3. De Castro, V., Vara, J.M., Marcos, E. Model Transformation for Service-Oriented Web Applications Development. Workshop Proceedings of 7th International Conference on Web Engineering. July 2007, pp. 284-198.
