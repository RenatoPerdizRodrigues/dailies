import React from 'react';
import { View, ImageBackground, Text, StyleSheet, TextInput } from 'react-native';

const Login = () => {
    return (
        <View style={styles.container}>
            <ImageBackground
                source={require('../../assets/page.png')}
                style={styles.background}
                imageStyle={{ width: 285, height: 462, top: undefined }}
            />
            <Text style={styles.text}>Dailies</Text>

            <View>
                <TextInput
                    style={styles.input1}
                    placeholder="     Login"
                    autoCorrect={false}
                />
                <TextInput
                    style={styles.input2}
                    placeholder="      Senha"
                    autoCorrect={false}
                />
            </View>

            <View style={styles.bottom}>
                <Text>Cadastre-se</Text>
                <Text>Esqueci minha senha</Text>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#f7f7f7',
        alignItems: 'center',
        justifyContent: 'center',
        padding: 64,
    },
    text: {
        color: '#363535',
        fontSize: 40,
        alignSelf: 'center',
        justifyContent: 'flex-end',
        marginTop: -70,
        marginRight: -90,
    },
    background: {
        width: "100%",
        height: "15%",
        padding: 1,
        paddingVertical: 40,
    },
    input1: {
        height: 60,
        width: 350,
        flexDirection: 'row',
        alignItems: 'center',
        backgroundColor: '#ffffff',
        borderWidth: 2,
        borderColor: '#f0f0f0',
        borderRadius: 10,
        marginTop: 30,
    },
    input2: {
        height: 60,
        width: 350,
        flexDirection: 'row',
        alignItems: 'center',
        backgroundColor: '#ffffff',
        borderWidth: 2,
        borderColor: '#f0f0f0',
        borderRadius: 10,
        marginTop: 10,
    },
    bottom: {
        marginTop: 20,
        width: '85%',
        justifyContent: 'flex-end',
        alignItems: 'flex-end',
    }
});

export default Login;