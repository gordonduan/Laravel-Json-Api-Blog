## Secrets
### Decrypt
```sh
$ gcloud kms decrypt \
    --key default \
    --keyring default \
    --location global \
    --plaintext-file k8s/production/secrets.yaml \
    --ciphertext-file k8s/production/secrets.enc.yaml
```

### Encrypt
```sh
$ gcloud kms encrypt \
    --key default \
    --keyring default \
    --location global \
    --plaintext-file k8s/production/secrets.yaml \
    --ciphertext-file k8s/production/secrets.enc.yaml
```
