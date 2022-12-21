

pipeline {

    agent any

        stages {

            stage("build") {

                steps {

                    script{
                        if (env.BRANCH_NAME== 'release_1.0.0'){
                            sh 'docker system prune -af --volumes'

                            sh 'echo building application !'

                            sh 'docker-compose up --build -d'

                        }
                    }

                }

            }


            stage("test") {

                steps {
                      script{
                        if (env.BRANCH_NAME== 'release_1.0.0'){

                            sh ' echo testing application'
                            sh 'docker exec testjenkins2_develop_videgrenier_1 sh -c "./vendor/bin/phpunit ./tests"'
                
                        }
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
    
