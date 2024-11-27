---
title: "From Hoare's Monitors to Dijkstra's Semaphores"
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

# From Hoare's Monitors to Dijkstra's Semaphores

> **By Freddy Allilaire (INRIA)** \
> March 2007

This is a classic in synchronization. We propose an automatic translation from Hoare's monitors into Dijkstra's semaphores.

## Keywords

Hoare's Monitor Dijkstra's Semaphore, [Programming](https://en.wikipedia.org/wiki/Programming).

## Overview

This is a classic in synchronization. We propose an automatic translation from Hoare's monitors as defined in [[1]](#references) into Dijkstra's semaphores as initially introduced in [[2]](#references). The ATL transformation code follows the rules given in [[1]](#references). A complete reprint of this paper is available at: https://www.acm.org/classics/feb96/.

The overall approach is summarized in the following figure:

{{< figure src="img/UseCaseOverview.png" caption="\"From Hoare's Monitors to Dijkstra's Semaphores\" Use Case's Overview" >}}

As a classical example, we can take the readers and writers problem:

{{< figure src="img/CodeSample1.png" >}}

Another example is the bounded buffer presented at: https://www.acm.org/classics/feb96/bounded_buffer.html.

In [[1]](#references) a set of rules for translating from monitors to semaphores is given to prove that monitors can be implemented by semaphores. We reproduce below these rules that may be found at: https://www.acm.org/classics/feb96/interpretation.html.

"Obviously, we shall require for each monitor a Boolean semaphore "mutex" to ensure that the bodies of the local procedures exclude each other. The semaphore is initialized to 1; a P(mutex) must be executed on entry to each local procedure, and a V(mutex) must usually be executed on exit from it.

When a process signals a condition on which another process is waiting, the signaling process must wait until the resumed process permits it to proceed. We therefore introduce for each monitor a second semaphore "urgent" (initialized to 0), on which signaling processes suspend themselves by the operation P(urgent). Before releasing exclusion, each process must test whether any other process is waiting on urgent, and if so, must release it instead by a V(urgent) instruction We therefore need to count the number of processes waiting on urgent, in an integer "urgentcount" (initially zero). Thus each exit from a procedure of a monitor should be coded:

{{< figure src="img/CodeSample2.png" >}}

Finally, for each condition local to the monitor, we introduce a semaphore "condsem" (initialized to 0), on which a process desiring to wait suspends itself by a P(condsem) operation. Since a process signaling this condition needs to know whether anybody is waiting, we also need a count of the number of waiting processes held in an integer variable "condcount" (initially 0). The operation "cond.wait" may now be implemented as follows (recall that a waiting program must release exclusion before suspending itself):

{{< figure src="img/CodeSample3.png" >}}

The signal operation may be coded:

{{< figure src="img/CodeSample4.png" >}}

In this implementation, possession of the monitor is regarded as a privilege which is explicitly passed from one process to another. Only when no one further wants the privilege is mutex finally released.

This solution is not intended to correspond to recommended "style" in the use of semaphores. The concept of a condition-variable is intended as a substitute for semaphores, and has its own style of usage, in the same way that while loops or coroutines are intended as a substitute for jumps.

In many cases, the generality of this solution is unnecessary, and a significant improvement in efficiency is possible.

  1. When a procedure body in a monitor contains no wait or signal, exit from the body can be coded by a simple V(mutex) since urgentcount cannot have changed during the execution of the body.
  2. If a cond.signal is the last operation of a procedure body, it can be combined with monitor exit as follows: {{< figure src="img/CodeSample5.png" >}}
  3. If there is no other wait or signal in the procedure body, the second line shown above can also be omitted.
  4. If every signal occurs as the last operation of its procedure body, the variables urgentcount and urgent can be omitted, together with all operations upon them. This is such a simplification that O-J. Dahl suggests that signals should always be the last operation of a monitor procedure; in fact, this restriction is a very natural one, which has been unwittingly observed in all examples of this paper.

Significant improvements in efficiency may also be obtained by avoiding the use of semaphores, and by implementing conditions directly in hardware, or at the lowest and most uninterruptible level of software (e.g. supervisor mode). In this case, the following optimizations are possible.

  1. urgentcount and condcount can be abolished, since the fact that someone is waiting can be established by examining the representation of the semaphore, which cannot change surreptitiously within non interruptible mode.
  2. Many monitors are very short and contain no calls to other monitors. Such monitors can be executed wholly in non interruptible mode, using, as it were, the common exclusion mechanism provided by hardware. This will often involve less time in non interruptible mode than the establishment of separate exclusion for each monitor."

In summary we take into consideration the following rules from above:

  1. For each monitor M declare one semaphore (M_mutex), one counter (M_urgentcount) and one semaphore (M_urgent).
  2. For each condition C inside a semaphore declare one counter (C_count) and one semaphore (C_sem).
  3. For each method entry, perform the following code: M_mutex.P().
  4. For each method exit, perform the following code: {{< figure src="img/CodeSample6.png" >}}
  5. For each condition C.wait perform the following code: {{< figure src="img/CodeSample7.png" >}}
  6. For each condition C.signal perform the following code: {{< figure src="img/CodeSample8.png" >}}

## Why is this ATL transformation interesting?

For several reasons:

  1. It show how a DSL (monitors) may be translated quite easily in practice into another DSL (Semaphores). Note that both DSLs are extensions of the same pseudo-language.
  2. It shows how model transformation may be useful in establishing the semantics of one DSL (monitors) in terms of the semantics of another DSL (Semaphores).
  3. It give hints on how complex synchronization schemes may be transformed in basic schemes for example in basic java Threads.

To conclude, we provide below a set of screenshots showing the different input/output files provided/created with this use case:

{{< figure src="img/Sample.png" caption="Screenshots of the input/outputs of the use case" >}}

## Related Use Cases

None at the current time.

## References

  1. Hoare, C.A.R Monitors: An Operating System Structuring Concept Communications of the ACM, Vol. 17, No. 10. October 1974, pp. 549-557
  2. Dijkstra, E. W. Cooperating Sequential Processes. In programming Languages (Ed. F. Genuys), Academic Press, New York.

##  Download

{{< grid/div class="col-md-6" >}}
### [Complete scenario](../../atltransformations/#Monitor2Semaphore)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Scenario available in the ATL transformation zoo (with source files).
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Program Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#Program)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Program metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster. This work has also been supported by the Atlantic federation of labs.
