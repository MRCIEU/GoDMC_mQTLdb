# Website for GoDMC mQTL results

Hosted here: http://godmc.mqtldb.org/. See https://github.com/MRCIEU/GoDMC-api and https://github.com/MRCIEU/godmc-database for the other components to the website. Note that there is a landing page website http://www.godmc.org.uk/ which is developed here: https://github.com/MRCIEU/godmc-website

## Development

To build locally and serve at http://localhost:8777

```
docker build -t godmc_mqtldb .
docker-compuse up -d
```

