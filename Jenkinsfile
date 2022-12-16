

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