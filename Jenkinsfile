

pipeline {

    agent any

    
        stages {

            stage("build") {

                steps {
                    sh 'docker system prune -af --volumes'

                    sh 'echo building application !'

                    sh 'docker-compose up --build -d'

                
                    

                }

            }


            stage("test") {

                steps {

                   sh ' echo testing application'
                   sh 'pwd'
                   sh 'ls'
                   sh './vendor/bin/phpunit ./tests'
                    
                }

            }
            stage("deploy") {

                steps {

                    sh 'echo deploying application'
                    
                }

            }

            
            
        }
    
}