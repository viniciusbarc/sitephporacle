#!/bin/bash

# Script Testado no Oracle Linux 7.8

# Desativando SELINUX
sed -i 's/enforcing/disabled/g' /etc/selinux/config

# Instalando repositório do Oracle
yum install oracle-release-el7 -y

# Instalando Oracle Instant Client 19.x e SQLPLUS
yum install oracle-instantclient19.5-basic -y 
yum install oracle-instantclient19.5-sqlplus -y

# Instalando Repositório do PHP 7
yum install oracle-php-release-el7 -y

# Instalando PHP, Apache e Git
yum install php php-oci8-19c httpd git -y

# Liberando a porta 80 no Firewalld
firewall-cmd --permanent --zone=public --add-port=80/tcp
firewall-cmd --reload

# Configurando para Apache ser iniciado junto com o sistema
systemctl enable httpd.service

# Movendo arquivos PHP para /var/www/html
mv *.php /var/www/html/

# exibindo instruções na tela
echo "#############################################################"
echo "###           Algumas tarefas a serem feitas              ###"
echo "###                                                       ###"
echo "### 1- Reinicie o servidor para o SELINUX ser desativado  ###"
echo "### 2- Unzip a Wallet em:                                 ###"
echo "###    /usr/lib/oracle/19.5/client64/lib/network/admin/   ###"
echo "### 3- Configure o arquivo config.php                     ###"
echo "#############################################################"
