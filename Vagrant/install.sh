#!/usr/bin/env bash

sudo cp -rR /etc/yum.repos.d/ /etc/yum.repos.d-backup/
sudo ln -s /CCDNSandbox/Vagrant /vagrant
sudo chmod 755 /vagrant/shell/*.sh
sudo /vagrant/shell/os-detect.sh
sudo /vagrant/shell/initial-setup.sh
sudo /vagrant/shell/update-puppet.sh
sudo /vagrant/shell/librarian-puppet-vagrant.sh
 
sudo puppet apply /CCDNSandBox/Vagrant/puppet/manifests/default.pp --hiera_config=/CCDNSandBox/Vagrant/hiera.yaml --verbose --parser=future
 
mkdir /var/www/codeconsortium.com/
mkdir /var/www/codeconsortium.com/public
mv /CCDNSandBox/* /var/www/codeconsortium.com/public
 
cd /var/www/codeconsortium.com/public
 
mkdir app/cache app/logs
chmod 777 app/cache app/logs
 
composer install --dev --prefer-dist -o
 
php /var/www/codeconsortium.com/public/app/console --env=dev doctrine:database:create



# yum update --assumeyes
# 
# sudo echo "[epel]
# name=Extra Packages for Enterprise Linux 6 - $basearch
# mirrorlist=http://mirrors.fedoraproject.org/mirrorlist?repo=epel-6&arch=$basearch
# enabled=1
# gpgcheck=1
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-6
# failovermethod=priority
# priority=16" > /etc/yum.repos.d/epel.repo
# 
# sudo echo "[epel-puppet]
# name=epel puppet
# baseurl=http://tmz.fedorapeople.org/repo/puppet/epel/5/x86_64/
# enabled=1
# gpgcheck=0" > /etc/yum.repos.d/epel-puppet.repo
# 
# # sudo echo "[epel-debuginfo]
# # name=Extra Packages for Enterprise Linux 6 - $basearch - Debug
# # mirrorlist=http://mirrors.fedoraproject.org/mirrorlist?repo=epel-6&arch=$basearch
# # enabled=0
# # gpgcheck=1
# # gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-6
# # failovermethod=priority
# # priority=16" > /etc/yum.repos.d/epel-debuginfo.repo
# # 
# # sudo echo "[epel-source]
# # name=Extra Packages for Enterprise Linux 6 - $basearch - Source
# # mirrorlist=http://mirrors.fedoraproject.org/mirrorlist?repo=epel-source-6&arch=$basearch
# # enabled=0
# # gpgcheck=1
# # gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-6
# # failovermethod=priority
# # priority=16" > /etc/yum.repos.d/epel-source.repo
# 
# sudo echo "[puppetlabs-products]
# name=Puppet Labs Products El 6 - $basearch
# baseurl=http://yum.puppetlabs.com/el/6/products/$basearch
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
# enabled=1
# gpgcheck=1
# 
# [puppetlabs-deps]
# name=Puppet Labs Dependencies El 6 - $basearch
# baseurl=http://yum.puppetlabs.com/el/6/dependencies/$basearch
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
# enabled=1
# gpgcheck=1
# 
# [puppetlabs-devel]
# name=Puppet Labs Devel El 6 - $basearch
# baseurl=http://yum.puppetlabs.com/el/6/devel/$basearch
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
# enabled=0
# gpgcheck=1
# 
# [puppetlabs-products-source]
# name=Puppet Labs Products El 6 - $basearch - Source
# baseurl=http://yum.puppetlabs.com/el/6/products/SRPMS
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
# failovermethod=priority
# enabled=0
# gpgcheck=1
# 
# [puppetlabs-deps-source]
# name=Puppet Labs Source Dependencies El 6 - $basearch - Source
# baseurl=http://yum.puppetlabs.com/el/6/dependencies/SRPMS
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
# enabled=0
# gpgcheck=1
# 
# [puppetlabs-devel-source]
# name=Puppet Labs Devel El 6 - $basearch - Source
# baseurl=http://yum.puppetlabs.com/el/6/devel/SRPMS
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
# enabled=0
# gpgcheck=1" > /etc/yum.repos.d/puppet.repo
# 
# sudo echo "[remi-php55]
# name=Les RPM de remi pour Enterpise Linux $releasever - $basearch - PHP 5.5
# mirrorlist=http://rpms.famillecollet.com/enterprise/$releasever/php55/mirror
# enabled=1
# gpgcheck=1
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-remi
# priority=1" > /etc/yum.repos.d/remi-php55.repo
# 
# sudo echo "[remi]
# name=Les RPM de remi pour Enterpise Linux $releasever - $basearch
# mirrorlist=http://rpms.famillecollet.com/enterprise/$releasever/remi/mirror
# enabled=1
# gpgcheck=1
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-remi
# priority=1" > /etc/yum.repos.d/remi.repo
# 
# sudo echo "[remi-test]
# name=Les RPM de remi pour Enterpise Linux $releasever - $basearch - Test
# mirrorlist=http://rpms.famillecollet.com/enterprise/$releasever/test/mirror
# enabled=0
# gpgcheck=1
# gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-remi
# priority=1" > /etc/yum.repos.d/remi-test.repo
# 
# sudo echo "[nginx-release]
# name=nginx repo
# baseurl=http://nginx.org/packages/rhel/6/$basearch/
# enabled=1
# gpgcheck=1
# gpgkey=http://nginx.org/keys/nginx_signing.key
# priority=1" > /etc/yum.repos.d/nginx-release.repo
# 
# sudo yum install ruby --enablerepo=puppetdeps --assumeyes
# sudo yum install ruby-rgen --enablerepo=puppetdeps --assumeyes
# 
# sudo yum install puppet --enablerepo=puppet --assumeyes
# sudo yum install puppet-server --enablerepo=puppet --assumeyes
# 
# 
