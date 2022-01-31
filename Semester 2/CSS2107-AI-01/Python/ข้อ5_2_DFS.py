graph = {
    '1':['2','3'],   #                                      1
    '2':['4','5'],   #                      2                               3
    '3':['6','7'],   #              4               5               6               7
    '4':['8','9'],   #          8       9       10      11      12      13      14      15   
    '5':['10','11'], 
    '6':['12','13'],      
    '7':['14','15'], 
    '8':[],          
    '9':[],          
    '10':[],         
    '11':[],         
    '12':[],         
    '13':[],
    '14':[],
    '15':[]
}

def DLS(start,goal,path,level,maxD):

  path.append(start)
  if start == goal:
    return path

  if level == maxD:
    return False

  for child in graph[start]:
    if DLS(child,goal,path,level+1,maxD):
      return path
    path.pop()
  return False
  
  
  
start = '1'
goal = input('Enter the goal node : ')
maxD = int(10)
print()
path = list()
res = DLS(start,goal,path,0,maxD)
if(res):
    print("Path to goal node available")
    print("Path",path)
else:
    print("No path available for the goal node in given depth limit")