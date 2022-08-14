import pandas as pd


def P(A, containingB):
    """
    Given:
     - dataframe of recipes containing ingredient B,
     - string identifying ingredient A,
    returns the % probability of A being in the same recipe as B.

    i.e P(A|B) = P(A and B) / P(B) = No of recipes containing both A and B / No of recipes containing B
    """
    containingBandA = containingB[containingB['ingredients'].apply(lambda x: A in x)]

    return 100 * len(containingBandA) / len(containingB)


def make_ingredients_table(ds):
    """
    Returns a dataframe of all the unique ingredients in the data_set
    """
    b = ds['ingredients'].tolist()  # list of lists of ingredients
    c = [x for xs in b for x in xs]  # flatten the lists to one big list of ingredients
    df = pd.DataFrame()
    df['ingredient'] = c
    return df.drop_duplicates()


if __name__ == "__main__":
    answer = 'lentils'
    data_set = pd.read_json('train.json')
    ingredients = make_ingredients_table(data_set)

    containing_answer = data_set[data_set['ingredients'].apply(lambda x: answer in x)]
    ingredients['score'] = ingredients['ingredient'].apply(lambda x: P(x, containing_answer))
    ingredients.sort_values('score', ascending=False, inplace=True)
    ingredients.reset_index(drop=True, inplace=True)


