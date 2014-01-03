#!/usr/bin/env bash


yum update --assumeyes

sudo echo "[puppetdeps]
name=Puppet Labs Packages
baseurl=http://yum.puppetlabs.com/el/6/dependencies/x86_64/
enabled=0
gpgcheck=0" > /etc/yum.repos.d/puppetdeps.repo

sudo yum install ruby --enablerepo=puppetdeps --assumeyes
sudo yum install ruby-rgen --enablerepo=puppetdeps --assumeyes

sudo echo "[puppet]
name=Puppet Labs Packages
baseurl=http://yum.puppetlabs.com/el/6/products/x86_64/
enabled=0
gpgcheck=0" > /etc/yum.repos.d/puppet.repo

sudo yum install puppet --enablerepo=puppet --assumeyes
sudo yum install puppet-server --enablerepo=puppet --assumeyes

sudo echo "[epel]
name=Extra Packages for Enterprise Linux 5 - $basearch
#baseurl=http://download.fedoraproject.org/pub/epel/5/$basearch
mirrorlist=http://mirrors.fedoraproject.org/mirrorlist?repo=epel-5&arch=x86_64
failovermethod=priority
enabled=0
gpgcheck=0" > /etc/yum.repos.d/epel.repo
 
 
sudo echo "[epel-puppet]
name=epel puppet
baseurl=http://tmz.fedorapeople.org/repo/puppet/epel/5/x86_64/
enabled=0
gpgcheck=0" > /etc/yum.repos.d/epel-puppet.repo

