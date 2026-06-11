module "ecr" {
  source = "../../modules/ecr"

  repositories = {
    app = "ecommerce-app"
  }
}

module "s3" {
  source = "../../modules/s3"

  bucket_names = {
    "bucket1" = { bucket_name = "dev-app-data-848504403730" }
  }

  environment = "dev"
}

module "vpc" {
  source               = "../../modules/vpc"
  vpc_cidr             = "10.0.0.0/16"
  vpc_name             = "my-vpc"
  public_subnet_cidrs  = ["10.0.1.0/24", "10.0.2.0/24"]
  private_subnet_cidrs = ["10.0.3.0/24", "10.0.4.0/24"]
  availability_zones   = ["ap-south-1a", "ap-south-1b"]

  environment = "dev"
}

module "eks" {
  source = "../../modules/eks"

  cluster_name    = "skillpulse-dev-eks"
  cluster_version = "1.33"

  vpc_id     = module.vpc.vpc_id
  subnet_ids = module.vpc.private_subnet_ids

  environment = "dev"
}
