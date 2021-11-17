
import os, signal,sys

 
 
os.kill(int(sys.argv[1]), signal.CTRL_C_EVENT)