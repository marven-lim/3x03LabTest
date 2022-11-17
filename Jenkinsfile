pipeline{
	agent any
	stages {
		stage('Git'){
			steps{
				sh 'rm -rf 3x03LabTest || true'
				sh 'git clone https://github.com/marven-lim/3x03LabTest'
				sh 'cp 3x03LabTest/* /var/www/html/'
			}
        	}
        	stage('OWASP DependencyCheck') {
			steps {
				dependencyCheck additionalArguments: '--format HTML --format XML', odcInstallation: 'OWASPChecker'
			}
		}
		stage('Unit Test'){
			sh 'phpunit --log-junit 3x03LabTest/results/unittest.xml 3x03LabTest/checkpwtest.php'
		}
		stage('UI Test'){
			sh 'pytest --junitxml 3x03LabTest/results/uitest.xml 3x03LabTest/uitest.py'
		}
    }
    post {
	success {
		dependencyCheckPublisher pattern: 'dependency-check-report.xml'
		junit testResults: '3x03LabTest/results/unittest.xml'
		junit '3x03LabTest/results/uitest.xml'
	}
}
