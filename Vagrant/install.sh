#!/usr/bin/env bash


yum update --assumeyes

sudo echo "[epel]
name=Extra Packages for Enterprise Linux 6 - $basearch
mirrorlist=http://mirrors.fedoraproject.org/mirrorlist?repo=epel-6&arch=$basearch
enabled=1
gpgcheck=1
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-6
failovermethod=priority
priority=16" > /etc/yum.repos.d/epel.repo

sudo echo "[epel-puppet]
name=epel puppet
baseurl=http://tmz.fedorapeople.org/repo/puppet/epel/5/x86_64/
enabled=1
gpgcheck=0" > /etc/yum.repos.d/epel-puppet.repo

sudo echo "[puppetlabs-products]
name=Puppet Labs Products El 6 - $basearch
baseurl=http://yum.puppetlabs.com/el/6/products/$basearch
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
enabled=1
gpgcheck=1

[puppetlabs-deps]
name=Puppet Labs Dependencies El 6 - $basearch
baseurl=http://yum.puppetlabs.com/el/6/dependencies/$basearch
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
enabled=1
gpgcheck=1

[puppetlabs-devel]
name=Puppet Labs Devel El 6 - $basearch
baseurl=http://yum.puppetlabs.com/el/6/devel/$basearch
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
enabled=0
gpgcheck=1

[puppetlabs-products-source]
name=Puppet Labs Products El 6 - $basearch - Source
baseurl=http://yum.puppetlabs.com/el/6/products/SRPMS
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
failovermethod=priority
enabled=0
gpgcheck=1

[puppetlabs-deps-source]
name=Puppet Labs Source Dependencies El 6 - $basearch - Source
baseurl=http://yum.puppetlabs.com/el/6/dependencies/SRPMS
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
enabled=0
gpgcheck=1

[puppetlabs-devel-source]
name=Puppet Labs Devel El 6 - $basearch - Source
baseurl=http://yum.puppetlabs.com/el/6/devel/SRPMS
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-puppetlabs
enabled=0
gpgcheck=1" > /etc/yum.repos.d/puppet.repo

sudo echo "[nginx-release]
name=nginx repo
baseurl=http://nginx.org/packages/rhel/6/$basearch/
enabled=1
gpgcheck=1
gpgkey=http://nginx.org/keys/nginx_signing.key
priority=1" > /etc/yum.repos.d/nginx-release.repo

sudo yum install ruby --enablerepo=puppetdeps --assumeyes
sudo yum install ruby-rgen --enablerepo=puppetdeps --assumeyes

sudo yum install puppet --enablerepo=puppet --assumeyes
sudo yum install puppet-server --enablerepo=puppet --assumeyes


