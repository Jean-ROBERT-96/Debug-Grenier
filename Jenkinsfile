def remote = [:]
                remote.name = 'test'
                remote.host = '0.tcp.ngrok.io'
                remote.port = 17139
                remote.user = 'henry'
                remote.password = 'henry'
                remote.allowAnyHosts = true

pipeline {

    agent any

    
        stages {

            stage("build") {

                steps {

                    sh 'echo building application'

                }

            }


            stage("test") {

                steps {

                   sh' echo testing application'
                    
                }

            }
            stage("deploy") {

                steps {

                    sh 'echo deploying application'
                    
                }

            }

            
            
        }
    
}