# atl-website-hugo

This project contains the [Hugo](https://gohugo.io/) source code of the [Eclipse ATL website](https://github.com/eclipse-atl/atl-website).

We've ensured that this project is compatible with `Hugo 0.110.0`. For information on the specific versions of Hugo we support, you can refer to the [readme.md](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme#getting-started) of the [Hugo Solstice Theme](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme) project.

[[_TOC_]]

## Getting started

Clone the project with submodules and start a web server:

```bash
git clone --recurse-submodules https://github.com/eclipse-atl/atl-website-hugo.git
cd atl-website-hugo
hugo server
```

### Update hugo-solstice-theme

The [hugo-solstice-theme](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-solstice-theme) was added to this project as a Git submodule. We recomend that you update to the latest version before getting started:

```bash
git submodule update --remote
```

Please make sure to keep this sub-module up-to-date if you decide to utilize it. The Eclipse Foundation Webdev team regularly publishes new versions. For more information, please see Git documentation on [submodules](https://git-scm.com/book/en/v2/Git-Tools-Submodules).

## Build the project's website

The preferred static website generator for Eclipse project websites is [Hugo](https://gohugo.io/) and we recommend to our projects that they get started by creating a copy of our [hugo-eclipsefdn-website-boilerplate](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-eclipsefdn-website-boilerplate) project. While you're not obligated to use them, please note that Hugo and hugo-eclipsefdn-website-boilerplate are the supported solutions by the Eclipse Foundation. Using a different technology may result in reduced support.

We recommend two different solutions to create and manage your static project website. The easiest solution is to keep both the source and distribution files together in one repository. The "hugo" command will create all the static files for your website in the "public" folder which you need to commit in your repository. To do so, remove "/public/" from the .gitignore file. This is included by default because projects often prefer to keep their source code and distribution files in separate repositories and utilize CI to ensure their website is always built with the same version of Hugo. We don't recommend the single Git repo solution if more than one individual is responsible for updating the website. This brings us to our next solution.

In the advanced setup, you'll need two Git repositories. The first one will contain your Hugo website's source code, which you can get started by cloning this repo. The second repository stores your Hugo build results (the static HTML that our web server will end up hosting). Once you've completed the initial setup, managing two repos isn't a concern because the second one will be automatically updated via CI. See the Jenkins integration section below for more information.

When your website is ready for publication or if you need help creating your website Git repositories, please notify us by [opening a ticket](https://gitlab.eclipse.org/eclipsefdn/helpdesk/-/issues/new?issuable_template=project-website). Ensure to share pertinent project information and your Git repositories information with us.

If you don't already have two Git repositories for your website, you can request them to be created by .

### Jenkins integration

Before deploying your website, you must update the `Jenkinsfile` at the root of this repository with the correct values for the `PROJECT_NAME` and `PROJECT_BOT_NAME` environment variables. Please note that this boilerplate includes two `Jenkinsfile` template depending on whether your repositories are hosted on Eclipse GitLab or GitHub. You'll need to rename either `Jenkinsfile.GitHub` or `Jenkinsfile.GitLab` to `Jenkinsfile` based on where your Git repositories are hosted.  Additionally, it's important to update the `README.md`, `config.toml`, and all files in the `content` folder. Remember, this is just a boilerplate to kickstart your project; you'll still need to create pages and content.

If you don't have a Jenkins instance already, [ask for one](https://wiki.eclipse.org/CBI#Requesting_a_JIPP_instance).
Please note that the `Jenkinsfile` file example makes several assumptions. For instance, it assumes that your project will use main as the default branch. Projects must customize the file to suit their specific requirements and configurations.

### GitLab CI integration

Before deploying your website, rename `.gitlab-ci.template.yml` to `.gitlab-ci.yml`.

Configure your project to support CI integration. Only GitLab project maintainers have access to this setting. Navigate to `Settings` > `General` > `Visibility, project features, permissions`, and ensure that `CI/CD` is checked. Don't forget to save your changes.

Please be aware that the example `.gitlab-ci.template.yml` file makes several assumptions. For instance, it assumes that your project source is in the `main` branch, `deploy` is the targeting branch for generated files and that `push-modification` only runs with manual action. Customize your configuration according to specific requirements and configurations.

### Declared Project Licenses

This program and the accompanying materials are made available under the terms
of the Eclipse Public License v. 2.0 which is available at
http://www.eclipse.org/legal/epl-2.0.

SPDX-License-Identifier: EPL-2.0

## Trademarks

* Eclipse® is a Trademark of the Eclipse Foundation, Inc.
* Eclipse Foundation is a Trademark of the Eclipse Foundation, Inc.

## Copyright and license

Copyright 2021 the [Eclipse Foundation, Inc.](https://www.eclipse.org) and the [hugo-eclipsefdn-website-boilerplate authors](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-eclipsefdn-website-boilerplate/-/graphs/main). Code released under the [Eclipse Public License Version 2.0 (EPL-2.0)](https://gitlab.eclipse.org/eclipsefdn/it/webdev/hugo-eclipsefdn-website-boilerplate/-/blob/main/LICENSE).
