

pipeline {

    agent any

    
        stages {

            

            stage("build") {
                if (env.BRANCH_NAME== 'develop'){

                steps {
                    sh 'docker system prune -af --volumes'

                    sh 'echo building application !'

                    sh 'docker-compose up --build -d'

                
                    }

                }

            }


            stage("test") {
                if (env.BRANCH_NAME== 'develop'){
                steps {

                   sh ' echo testing application'
                   sh 'docker exec testjenkins2_develop_videgrenier_1 sh -c "./vendor/bin/phpunit ./tests"'
                
                    }
                }


            }
            
            stage("deploy") {

                steps {

                    sh 'echo deploying application'
                    
                }

            }

        }    
            
        
    
}