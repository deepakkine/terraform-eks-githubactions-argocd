module "eks" {
  source  = "terraform-aws-modules/eks/aws"
  version = "~> 20.37"

  cluster_name    = var.cluster_name
  cluster_version = var.cluster_version

  vpc_id     = var.vpc_id
  subnet_ids = var.subnet_ids

  cluster_endpoint_public_access  = true
  cluster_endpoint_private_access = true

  enable_cluster_creator_admin_permissions = true

  cluster_addons = {
    coredns = {}
    kube-proxy = {}
    vpc-cni = {}

    aws-ebs-csi-driver = {}
  }

  eks_managed_node_groups = {
    default = {
      instance_types = ["t3.small"]

      min_size     = 2
      max_size     = 3
      desired_size = 2
    }
  }

  tags = {
    Environment = var.environment
    ManagedBy   = "Terraform"
  }
}