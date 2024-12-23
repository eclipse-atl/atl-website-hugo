pipeline {

  agent {
    kubernetes {
      label 'hugo-agent'
      yaml """
apiVersion: v1
metadata:
  labels:
    run: hugo
  name: hugo-pod
spec:
  containers:
    - name: jnlp
      volumeMounts:
      - mountPath: /home/jenkins/.ssh
        name: volume-known-hosts
      env:
      - name: "HOME"
        value: "/home/jenkins"
    - name: hugo
      image: eclipsecbi/hugo_extended:0.110.0
      command:
      - cat
      tty: true
  volumes:
  - configMap:
      name: known-hosts
    name: volume-known-hosts
"""
    }
  }

  environment {
    PROJECT_NAME = "atl" // must be all lowercase.
    PROJECT_BOT_NAME = "ATL Bot" // Capitalize the name
    PROJECT_GH_ORG = "eclipse-atl" // e.g. eclipse-hono
    PROJECT_WEBSITE_REPO = "atl-website" // e.g. hono-website
  }

  triggers { pollSCM('H/10 * * * *')

 }

  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))
    checkoutToSubdirectory('hugo')
    timeout(time: 60, unit: 'MINUTES')
  }

  stages {
    stage('Checkout www repo') {
      steps {
        dir('www') {
            sshagent(['github-bot-ssh']) {
                sh '''
                    git clone ssh://git@github.com/${PROJECT_GH_ORG}/${PROJECT_WEBSITE_REPO}.git .
                    git checkout master
                '''
            }
        }
      }
    }
    stage('Build website with Hugo') {
      steps {
        container('hugo') {
            dir('hugo') {
                sh 'hugo -b https://eclipse.dev/${PROJECT_NAME}/'
            }
        }
      }
    }
    stage('Push to $env.BRANCH_NAME branch') {
      when {
        anyOf {
          branch "main"
        }
      }
      steps {
        sh 'rm -rf www/* && cp -Rvf hugo/public/* www/'
        dir('www') {
            sshagent(['github-bot-ssh']) {
                sh '''
                git add -A
                if ! git diff --cached --exit-code; then
                  echo "Changes have been detected, publishing to repo '${PROJECT_GH_ORG}/${PROJECT_WEBSITE_REPO}'"
                  git config user.email "${PROJECT_NAME}-bot@eclipse.org"
                  git config user.name "${PROJECT_BOT_NAME}"
                  git commit -m "Website build ${JOB_NAME}-${BUILD_NUMBER}"
                  git log --graph --abbrev-commit --date=relative -n 5
                  if [ "${BRANCH_NAME}" = "main" ]; then
                    git push origin HEAD:master
                  else
                    git push origin HEAD:${BRANCH_NAME}
                  fi
                else
                  echo "No changes have been detected since last build, nothing to publish"
                fi
                '''
            }
        }
      }
    }
  }
}
