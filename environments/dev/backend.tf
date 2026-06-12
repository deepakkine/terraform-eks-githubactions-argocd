terraform {
  backend "s3" {
    bucket       = "deepak-terraform-state-848504403730" # Replace with your S3 bucket name
    key          = "dev/terraform.tfstate"               # Path within the bucket to store the state file
    region       = "ap-south-1"                          # Replace with your AWS region
    use_lockfile = true                                  # Enable state locking to prevent concurrent modifications
    encrypt      = true                                  # Enable encryption for the state file at rest
  }
}
