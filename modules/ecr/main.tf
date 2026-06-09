resource "aws_ecr_repository" "repos" {
  for_each = var.repositories

  name = each.value

  image_scanning_configuration {
    scan_on_push = true
  }

  force_delete = true

  tags = {
    ManagedBy = "Terraform"
  }
}