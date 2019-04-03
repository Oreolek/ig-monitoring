#!groovy

def deploy_path = "/var/www/grammonitor";

node {
  currentBuild.result = "SUCCESS";
  try {
    stage('Checkout'){
      sh 'cd '+deploy_path+' && git pull';
      sh 'cd '+deploy_path+' && composer install --no-dev';
    }
  }
  catch (err) {
    currentBuild.result = "FAILURE";

    emailext (
      subject: "FAILURE: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]'",
      body: """<p>FAILED: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]':</p>
      <p>Check console output at "<a href="${env.BUILD_URL}">${env.JOB_NAME} [${env.BUILD_NUMBER}]</a>"</p>""",
      recipientProviders: [developers()]
    );
    throw err;
  }
}
