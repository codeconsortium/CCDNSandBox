# .bash_profile

# Get the aliases and functions
if [ -f ~/.bashrc ]; then
	. ~/.bashrc
fi

# User specific environment and startup programs

PATH=$PATH:$HOME/bin

export PATH
if [ -f ~/.bash_git ] ; then source ~/.bash_git; fi
if [ -f ~/.bash_aliases ] ; then source ~/.bash_aliases; fi

# Print the logo
cat ~/.bash_welcome

