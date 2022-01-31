import random as ran

from game import Agent
from game import Directions
import search
import searchAgents
from game import Actions

class MyLocationAgent(Agent):
    def __init__(self, fn='lol',prob='PositionSearchProblem', heuristic='nullHeuristic'):

        func = getattr(search, fn)
        self.searchFunction = func
        self.searchType = globals()[prob]

    def registerInitialState(self, state):
        problem = self.searchType(state) 
        self.actions  = self.searchFunction(problem) 

    def getAction(self, state):
        if 'actionIndex' not in dir(self): self.actionIndex = 0
        i = self.actionIndex
        self.actionIndex += 1
        if i < len(self.actions):
            return self.actions[i]
        else:
            return Directions.STOP


class RandomAgent(Agent):
    "An agent that picks random legal action"

    def getAction(self, state):
        "the agent recives a GameState (define in pacman.py)"
        print (('Location:'), state.getPacmanPosition())
        listofactions = state.getLegalPacmanActions()[:]
        listofactions.remove(Directions.STOP)
        print(('Actions available:'), listofactions)
        action = ran.choice(listofactions)
        print ("Going" + action)
        return action

class ReflexAgent(Agent):
    "An agent that prioritize action that will immdiately gain food pellet"

    def getAction(self, state):
        "The agent receives a GameState (defined in pacman.py)"
        print (('Location:'), state.getPacmanPosition())
        listofactions = state.getLegalPacmanActions()[:]
        listofactions.remove(Directions.STOP) #remove 'STOP'
        print (('Actions available:'), listofactions)
        num_food = state.getNumFood()
        for act in listofactions: 
           if num_food > state.generatePacmanSuccessor(act).getNumFood():
               #if can eat food, take the action
               return act
        return ran.choice(listofactions)

class PositionSearchProblem(search.SearchProblem):
    """
    A search problem defines the state space, start state, goal test, successor
    function and cost function.  This search problem can be used to find paths
    to a particular point on the pacman board.

    The state space consists of (x,y) positions in a pacman game.

    Note: this search problem is fully specified; you should NOT change it.
    """

    def __init__(self, gameState, costFn = lambda x: 1, goal=(1,1), start=None, warn=True, visualize=True):
        """
        Stores the start and goal.

        gameState: A GameState object (pacman.py)
        costFn: A function from a search state (tuple) to a non-negative number
        goal: A position in the gameState
        """
        self.walls = gameState.getWalls()
        self.startState = gameState.getPacmanPosition()
        if start != None: self.startState = start
        self.goal = goal
        self.costFn = costFn
        self.visualize = visualize
        if warn and (gameState.getNumFood() != 1 or not gameState.hasFood(*goal)):
            print('Warning: this does not look like a regular search maze')

        # For display purposes
        self._visited, self._visitedlist, self._expanded = {}, [], 0 # DO NOT CHANGE

    def getStartState(self):
        return self.startState

    def isGoalState(self, state):
        isGoal = state == self.goal

        # For display purposes only
        if isGoal and self.visualize:
            self._visitedlist.append(state)
            import __main__
            if '_display' in dir(__main__):
                if 'drawExpandedCells' in dir(__main__._display): #@UndefinedVariable
                    __main__._display.drawExpandedCells(self._visitedlist) #@UndefinedVariable

        return isGoal

    def getSuccessors(self, state):
        """
        Returns successor states, the actions they require, and a cost of 1.

         As noted in search.py:
             For a given state, this should return a list of triples,
         (successor, action, stepCost), where 'successor' is a
         successor to the current state, 'action' is the action
         required to get there, and 'stepCost' is the incremental
         cost of expanding to that successor
        """

        successors = []
        for action in [Directions.NORTH, Directions.SOUTH, Directions.EAST, Directions.WEST]:
            x,y = state
            dx, dy = Actions.directionToVector(action)
            nextx, nexty = int(x + dx), int(y + dy)
            if not self.walls[nextx][nexty]:
                nextState = (nextx, nexty)
                cost = self.costFn(nextState)
                successors.append( ( nextState, action, cost) )

        # Bookkeeping for display purposes
        self._expanded += 1 # DO NOT CHANGE
        if state not in self._visited:
            self._visited[state] = True
            self._visitedlist.append(state)

        return successors

    def getCostOfActions(self, actions):
        """
        Returns the cost of a particular sequence of actions. If those actions
        include an illegal move, return 999999.
        """
        if actions == None: return 999999
        x,y= self.getStartState()
        cost = 0
        for action in actions:
            # Check figure out the next state and see whether its' legal
            dx, dy = Actions.directionToVector(action)
            x, y = int(x + dx), int(y + dy)
            if self.walls[x][y]: return 999999
            cost += self.costFn((x,y))
        return cost

