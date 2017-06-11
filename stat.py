import pandas as pd

colNames = ['time', 'peakMemory']

ifData = pd.read_csv('run_if.log', names=colNames, delimiter='\t')
arrayData = pd.read_csv('run_array.log', names=colNames, delimiter='\t')
transducersData = pd.read_csv('run_transducers.log', names=colNames, delimiter='\t')

print("if:")
print(ifData.describe())
print("array:")
print(arrayData.describe())
print("transducres:")
print(transducersData.describe())
