import React from 'react';
import { View, ImageBackground, Text, StyleSheet } from 'react-native';

const Login = () => {
    return (
        <View style={styles.container}>
            <ImageBackground
                source={require('../../assets/page.png')}
                style={styles.background}
                imageStyle={{ width: 274, height: 368 }}
            />
            <Text style={styles.text}>Dailies</Text>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#f7f7f7',
        alignItems: 'center',
        justifyContent: 'center',
        padding: 32,
    },
    text: {
        color: '#363535',
        fontSize: 40,
        alignSelf: 'center',
        justifyContent: 'flex-end',
        marginTop: 64,
    },
    background: {
        flex: 1,
        alignSelf: 'center',
        justifyContent: 'center',
        marginRight: 64,
        marginTop: 64,
    }
});

export default Login;