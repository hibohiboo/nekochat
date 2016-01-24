import { FontIcon, Snackbar } from 'material-ui';
import React from 'react';
import { format } from '../utility/format';

export const Snack = (props) => {
    const {
        snackList,
        remove,
    } = props;
    const snack = snackList[0] || {};
    const message = snack.message && format(snack.message, snack.data) || '';

    const MessageStyle = {
        display: 'flex',
        alignItems: 'center',
        float: 'left',
    };
    const IconStyle = {
        marginRight: 8,
    };
    const InnerStyle = {
    };

    return (
        <Snackbar
            action={snack.action || 'close'}
            autoHideDuration={5000}
            message={
                <div style={MessageStyle}>
                    {snack.icon && (
                        <FontIcon
                            className="material-icons"
                            color="white"
                            style={IconStyle}>
                            {snack.icon}
                        </FontIcon>
                    )}
                    <div style={InnerStyle}>{message}</div>
                </div>
            }
            open={snackList.length > 0}
            onActionTouchTap={() => {
                if (snack.onAction) {
                    snack.onAction(snack.data);
                }
                remove(snack);
            }}
            onRequestClose={() => remove(snack)} />
    );
};