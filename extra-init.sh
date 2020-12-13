#!/bin/bash

# WPI Extra
# by DimaMinka (https://dima.mk)
# https://github.com/wpi-pw/app

# Get config files and put to array
wpi_confs=()
for ymls in wpi-config/*
do
  wpi_confs+=("$ymls")
done

# Get wpi-source for yml parsing, noroot, errors etc
source <(curl -s https://raw.githubusercontent.com/wpi-pw/template-workflow/master/wpi-source.sh)

cur_env=$(cur_env)
env_config="${PWD}/config/environments/$cur_env.php"
files=$(wpi_yq extra.files)

# GIT clone extra repo last commit
git clone --depth 1 https://github.com/wpi-pw/template-extra.git --branch master --single-branch --quiet

# Copy extra dir to app dir
 cp -R ${PWD}/template-extra/extra ${PWD}

if [ "$cur_env" == "local" ] || [ "$cur_env" == "dev" ]; then
  cp ${PWD}/config/environments/development.php $env_config
elif [ "$cur_env" != "staging" ]; then
  cp ${PWD}/config/environments/staging.php $env_config
fi

if [ -f "$env_config" ]; then

  # Insert php script to environment file
cat <<EOT >> $env_config

// Load extra files
\$error = '';
\$files = explode(',', '$files');
array_map(function (\$file) use (\$error) {
    \$file = __DIR__ . "/../../extra/{\$file}.php";
    if (file_exists(\$file)) {
        require_once \$file;
    }
}, \$files);
EOT

fi

# Remove extra repo
rm -rf ${PWD}/template-extra

# Remove WPI config directory after installing process
if [ "$(wpi_yq "env.$cur_env.app_no_config")" == "true" ]; then
  rm -rf "${PWD}/wpi-config"
fi

